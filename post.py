import requests
api_key_value = "9F7j3bA5TAmPt"
url = "http://inoprex.com/projectbti/API/API.php
data = "api_key=" + api_key_value + "&jenis_sampah=" +"organik"+""
headers = {"Content-Type": "application/x-www-form-urlencoded"}
requests.post(url,data=data,headers=headers)
response = requests.post(url,headers,data)
print(response)
