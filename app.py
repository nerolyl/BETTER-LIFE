from flask import Flask, request, jsonify
from flask_cors import CORS
import requests

app = Flask(__name__)
CORS(app)  # تمكين CORS لجميع المسارات

# تعريف المسار الخاص بـ API
@app.route('/analyze_food', methods=['POST'])
def analyze_food():
    # التحقق من وجود الملف في الطلب
    if 'image' not in request.files:
        return jsonify({"error": "No image provided"}), 400

    # استلام الصورة من الطلب
    image = request.files['image']

    # كود التحليل باستخدام requests كما هو
    url = "https://vision.foodvisor.io/api/1.0/en/analysis/"
    headers = {"Authorization": "Api-Key UHf3xec1.UryRxsWwSERtdhsyv36pREQxHXXTJt7J"}
    
    response = requests.post(url, headers=headers, files={"image": image})
    
    # إذا حدث خطأ في الطلب
    if response.status_code != 200:
        return jsonify({"error": "Failed to analyze image"}), response.status_code

    data = response.json()

    # إذا كان هناك عناصر مستخرجة من الصورة
    if data['items']:
        food_items = []
        total_calories = 0  # متغير لحساب السعرات الحرارية الكلية
        total_carbs = 0  # متغير لحساب الكربوهيدرات الكلية
        total_fat = 0  # متغير لحساب الدهون الكلية
        total_proteins = 0  # متغير لحساب البروتينات الكلية
        for item in data['items']:
            food_info = item['food'][0]['food_info']
            nutrition = food_info['nutrition']

            # استخراج المعلومات الغذائية
            calories_100g = nutrition.get('calories_100g', 0)
            carbs_100g = nutrition.get('carbs_100g', 0)
            fat_100g = nutrition.get('fat_100g', 0)
            proteins_100g = nutrition.get('proteins_100g', 0)
            
            result = {
                "display_name": food_info.get('display_name'),
                "calories_100g": calories_100g,
                "carbs_100g": carbs_100g,
                "fat_100g": fat_100g,
                "proteins_100g": proteins_100g
            }
            
            food_items.append(result)  # إضافة النتيجة إلى قائمة العناصر الغذائية
            total_carbs += carbs_100g or 0  # إضافة الكربوهيدرات إلى المجموع
            total_fat += fat_100g or 0  # إضافة الدهون إلى المجموع
            total_proteins += proteins_100g or 0  # إضافة البروتين إلى المجموع
            total_calories += calories_100g or 0  # إضافة السعرات الحرارية إلى المجموع

        # صياغة المخرجات بشكل سهل على المستخدم
        output = ""
        for item in food_items:
            output += f"Food name: {item['display_name']}\n"
            output += f"calories: {item['calories_100g']}\n"
            output += f"protein: {item['proteins_100g']}\n"
            output += f"carb: {item['carbs_100g']}\n"
            output += f"fat: {item['fat_100g']}\n\n"

        output += f"Total calories: {round(total_calories)}\n"
        output += f"Total proteins: {round(total_proteins)}\n"
        output += f"Total carbs: {round(total_carbs)}\n"
        output += f"Total fat: {round(total_fat)}\n"


        return jsonify({"output": output}), 200
    else:
        return jsonify({"output": "No food items found. Please try again with a different image."}), 404

if __name__ == '__main__':
    app.run(debug=True)

