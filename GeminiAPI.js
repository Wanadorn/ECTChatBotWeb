//to import this class use :
//<script type="module">
//  import { geminiAPI } from "./GeminiAPI.js";
//</script>

// use this in your web to make PDF Function work :
// <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js"></script>

import { GoogleGenerativeAI, SchemaType } from "https://esm.run/@google/generative-ai";

export class GeminiAPI{
    #API_KEY;
    #AImodel;
    #genAI;
    #model;
    
    constructor(API_KEY = 'AIzaSyBDZGVQ1SYkgCYyopQs87xoGFsKXLFAIpg', AImodel = "gemini-1.5-flash"){
        this.#API_KEY = API_KEY;
        this.#AImodel = AImodel;
        const schema = {
            "description": "Course data with separate arrays for each field",
            "type": "object",
            "properties": {
              "id": {
                "type": "array",
                "description": "List of course IDs",
                "items": {
                  "type": "string"
                },
                "nullable": false
              },
              "name": {
                "type": "array",
                "description": "List of course names",
                "items": {
                  "type": "string"
                },
                "nullable": false
              },
              "credit": {
                "type": "array",
                "description": "List of course credits",
                "items": {
                  "type": "integer"
                },
                "nullable": false
              },
              "language": {
                "type": "array",
                "description": "List of course languages",
                "items": {
                  "type": "string"
                },
                "nullable": false
              },
              "year": {
                "type": "array",
                "description": "List of course years",
                "items": {
                  "type": "integer"
                },
                "nullable": false
              },
              "term": {
                "type": "array",
                "description": "List of course terms",
                "items": {
                  "type": "integer"
                },
                "nullable": false
              }
            },
            "required": ["id", "name", "credit", "language", "year", "term"]
          }
    
        try {
            this.#genAI = new GoogleGenerativeAI(this.#API_KEY);
            this.#model = this.#genAI.getGenerativeModel({
                model: this.#AImodel,
                generationConfig: {
                    responseMimeType: "application/json",
                    responseSchema: schema,
                },
            });
        } catch (error) {
            console.error("เกิดข้อผิดพลาดในการเชื่อมต่อ AI:", error);
        }
    }

    async fileToGenerativePart(file) { // fileToGenerativePart(document.getElementById('your-input-file-type-id-name').files)
        const base64EncodedDataPromise = new Promise((resolve) => {
            const reader = new FileReader();
            reader.onloadend = () => resolve(reader.result.split(',')[1]);
            reader.readAsDataURL(file);
        });
        return {
            inlineData: { data: await base64EncodedDataPromise, mimeType: file.type },
        };
    }

    async getDataFromImage(file){ // getDataFromImage(document.getElementById('your-input-file-type-id-name').files)
        const prompt = `
            สกัดข้อมูลเฉพาะ รหัสวิชา ชื่อวิชา หน่วยกิต ภาษาที่วิชานั้นใช้สอน ปีการศึกษา และภาคการศึกษา 
            โดยผลลัพธ์ต้องแยกข้อมูลตามประเภท และข้อมูลใน index เดียวกันของแต่ละประเภทต้องเป็นของวิชาเดียวกัน

            ตัวอย่างการจัดรูปแบบผลลัพธ์:
            {
            'id': [<รหัสวิชาที่ 1>, <รหัสวิชาที่ 2>, ...],
            'name': [<ชื่อวิชาที่ 1>, <ชื่อวิชาที่ 2>, ...],
            'credit': [<หน่วยกิตวิชาที่ 1>, <หน่วยกิตวิชาที่ 2>, ...],
            'language': [<ภาษาใช้สอนวิชาที่ 1>, <ภาษาใช้สอนวิชาที่ 2>, ...],
            'year': [<ปีการศึกษาวิชาที่ 1>, <ปีการศึกษาวิชาที่ 2>, ...],
            'term': [<ภาคการศึกษาวิชาที่ 1>, <ภาคการศึกษาวิชาที่ 1>, ...]
            }

            เงื่อนไขเพิ่มเติม:
            1. id: รหัสวิชา ดึงเฉพาะตัวเลขรหัสวิชา 9 หลัก ถ้า 9 หลักนั้นไม่ใช่ตัวเลขทั้งหมดหรือมีตัวอักษร "x" ไม่ต้องสกัดข้อมูลวิชานั้น
            2. name: ชื่อวิชา ดึงชื่อวิชาภาษาไทย ไม่ต้องแปลหรือใช้ชื่อภาษาอังกฤษที่อยู่ในวงเล็บ
            3. credit: หน่วยกิต ดึงเฉพาะตัวเลขด้านหน้าเครื่องหมายวงเล็บ เช่น 2 จาก '2(2-0-4)'
            4. language: ภาษาที่ใช้สอน ถ้ามีเครื่องหมาย * หลังชื่อวิชา ให้กำหนดเป็น 'en' หากไม่มีให้กำหนดเป็น 'th'
            5. year and term: ปีการศึกษา และภาคการศึกษา ระบุจากข้อมูลที่ปรากฏในหัวข้อ เช่น 'ปีที่ 1' และ 'ภาคการศึกษาที่ 2' แต่ถ้าเป็น 'ภาคการศึกษาฤดูร้อน' ให้เป็น 'ภาคการศึกษาที่ 3' แทน

            ตัวอย่างผลลัพธ์จากข้อมูลในภาพ:
            {
            'id': [
                '030523107',
                '030523118',
                '030523124',
                '030523126',
                '030523207',
                '030523218',
                '030523224',
                '030523226',
                '030523250',
                '030523602',
                '030943112'
            ],
            'name': [
                'ระบบไมโครคอนโทรลเลอร์',
                'การโปรแกรมเชิงวัตถุ',
                'การพัฒนาโปรแกรมประยุกต์บนเว็บ',
                'ระบบปฏิบัติการลินุกซ์และการบริหารจัดการ',
                'ปฏิบัติการระบบไมโครคอนโทรลเลอร์',
                'ปฏิบัติการการโปรแกรมเชิงวัตถุ',
                'ปฏิบัติการการพัฒนาโปรแกรมประยุกต์บนเว็บ',
                'ปฏิบัติการระบบปฏิบัติการลินุกซ์และการบริหารจัดการ',
                'โครงสร้างข้อมูลและการวิเคราะห์อัลกอริทึม',
                'ปฏิบัติการโครงสร้างข้อมูลและการวิเคราะห์อัลกอริทึม',
                'เมทริกซ์และการวิเคราะห์เวกเตอร์'
            ],
            'credit': [2, 2, 2, 2, 1, 1, 1, 1, 2, 1, 3],
            'language': ['th', 'en', 'th', 'th', 'th', 'en', 'th', 'th', 'en', 'en', 'th'],
            'year': [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
            'term': [2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2]
            }
        `;
        
        try {
            const imageParts = await Promise.all(
              [...file].map(f => this.fileToGenerativePart(f))
            );
    
            const result = await this.#model.generateContent([prompt, ...imageParts]);
            const response = await result.response;
            const text = await response.text();

            let genData = JSON.parse(text);
            return genData;
        }catch (error) {
            console.error(error);
        }
    }

    async getDataFromPDF(file,fromPage,toPage){ 
        // getDataFromImage(document.getElementById('your-input-file-type-id-name').files,firstPageToGetData,LastPageToGetData)
        const prompt = `
            สกัดข้อมูลเฉพาะ รหัสวิชา ชื่อวิชา หน่วยกิต ภาษาที่วิชานั้นใช้สอน ปีการศึกษา และภาคการศึกษา 
            โดยผลลัพธ์ต้องแยกข้อมูลตามประเภท และข้อมูลใน index เดียวกันของแต่ละประเภทต้องเป็นของวิชาเดียวกัน

            ตัวอย่างการจัดรูปแบบผลลัพธ์:
            {
            'id': [<รหัสวิชาที่ 1>, <รหัสวิชาที่ 2>, ...],
            'name': [<ชื่อวิชาที่ 1>, <ชื่อวิชาที่ 2>, ...],
            'credit': [<หน่วยกิตวิชาที่ 1>, <หน่วยกิตวิชาที่ 2>, ...],
            'language': [<ภาษาใช้สอนวิชาที่ 1>, <ภาษาใช้สอนวิชาที่ 2>, ...],
            'year': [<ปีการศึกษาวิชาที่ 1>, <ปีการศึกษาวิชาที่ 2>, ...],
            'term': [<ภาคการศึกษาวิชาที่ 1>, <ภาคการศึกษาวิชาที่ 1>, ...]
            }

            เงื่อนไขเพิ่มเติม:
            1. id: รหัสวิชา ดึงเฉพาะตัวเลขรหัสวิชา 9 หลัก ถ้า 9 หลักนั้นไม่ใช่ตัวเลขทั้งหมด ไม่ต้องสกัดข้อมูลวิชานั้น
            2. name: ชื่อวิชา ดึงชื่อวิชาภาษาไทย ไม่ต้องแปลหรือใช้ชื่อภาษาอังกฤษที่อยู่ในวงเล็บ
            3. credit: หน่วยกิต ดึงเฉพาะตัวเลขด้านหน้าเครื่องหมายวงเล็บ เช่น 2 จาก '2(2-0-4)'
            4. language: ภาษาที่ใช้สอน ถ้ามีเครื่องหมาย * หลังชื่อวิชา ให้กำหนดเป็น 'en' หากไม่มีให้กำหนดเป็น 'th'
            5. year and term: ปีการศึกษา และภาคการศึกษา ระบุจากข้อมูลที่ปรากฏในหัวข้อ เช่น 'ปีที่ 1' และ 'ภาคการศึกษาที่ 2' แต่ถ้าเป็น 'ภาคการศึกษาฤดูร้อน' ให้เป็น 'ภาคการศึกษาที่ 3' แทน

            ตัวอย่างผลลัพธ์จากการดึงข้อมูลจากข้อความ:
            {
            'id': [
                '030523107',
                '030523118',
                '030523124',
                '030523126',
                '030523207',
                '030523218',
                '030523224',
                '030523226',
                '030523250',
                '030523602',
                '030943112'
            ],
            'name': [
                'ระบบไมโครคอนโทรลเลอร์',
                'การโปรแกรมเชิงวัตถุ',
                'การพัฒนาโปรแกรมประยุกต์บนเว็บ',
                'ระบบปฏิบัติการลินุกซ์และการบริหารจัดการ',
                'ปฏิบัติการระบบไมโครคอนโทรลเลอร์',
                'ปฏิบัติการการโปรแกรมเชิงวัตถุ',
                'ปฏิบัติการการพัฒนาโปรแกรมประยุกต์บนเว็บ',
                'ปฏิบัติการระบบปฏิบัติการลินุกซ์และการบริหารจัดการ',
                'โครงสร้างข้อมูลและการวิเคราะห์อัลกอริทึม',
                'ปฏิบัติการโครงสร้างข้อมูลและการวิเคราะห์อัลกอริทึม',
                'เมทริกซ์และการวิเคราะห์เวกเตอร์'
            ],
            'credit': [2, 2, 2, 2, 1, 1, 1, 1, 2, 1, 3],
            'language': ['th', 'en', 'th', 'th', 'th', 'en', 'th', 'th', 'en', 'en', 'th'],
            'year': [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
            'term': [2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2]
            }
            โดยข้อความต่อไปนี้คือข้อความที่ต้องการนำมาสกัดข้อมูล : \n
        `;
        try{
            const reader = new FileReader();
            
  
            const readPDF = (file) => {
                return new Promise((resolve, reject) => {
                    reader.onload = async function () {
                        try {
                            const typedarray = new Uint8Array(this.result);
                            const loadingTask = pdfjsLib.getDocument({ data: typedarray });
                            const pdf = await loadingTask.promise;
                            let PDFtext = '';
                            for (let i = fromPage; i <= pdf.numPages && i <= toPage; i++) {
                                const page = await pdf.getPage(i);
                                const textContent = await page.getTextContent();
                                const pageText = textContent.items.map(item => item.str).join(' ');
                                PDFtext += pageText + '\n';
                            }
        
                            resolve(PDFtext);
                        } catch (err) {
                            reject(err);
                        }
                    };
                    reader.readAsArrayBuffer(file);
                });
            };

            const PDFtext = await readPDF(file);
            console.log(prompt + PDFtext);
            const result = await this.#model.generateContent(prompt + PDFtext);
            const response = await result.response;
            const text = await response.text();
            let genData = JSON.parse(text);

            reader.readAsArrayBuffer(file);
            return genData;
        }catch (error) {
            console.error(error);
        }
    }
}