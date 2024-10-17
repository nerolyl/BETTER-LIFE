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
        food_info = data['items'][0]['food'][0]['food_info']
        nutrition = food_info['nutrition']

        # استخراج المعلومات الغذائية
        result = {
            'display name': food_info.get('display_name'),
            "calories 100g": nutrition.get('calories_100g'),
            "carbs 100g": nutrition.get('carbs_100g'),
            "fat 100g": nutrition.get('fat_100g'),
            "proteins 100g": nutrition.get('proteins_100g')
        }

        return jsonify(result)
    else:
        return jsonify({"error": "No food items found in the image"}), 404

if __name__ == '__main__':
    app.run(debug=True)
