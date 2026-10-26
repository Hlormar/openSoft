import requests

data = {
    "matrix[0][0]": 1, "matrix[0][1]": 0, "matrix[0][2]": 0,
    "matrix[1][0]": 0, "matrix[1][1]": 1, "matrix[1][2]": 0,
    "matrix[2][0]": 0, "matrix[2][1]": 0, "matrix[2][2]": 1
}

r = requests.post("http://localhost:8000/form.php", data=data)
print("Status:", r.status_code)
print("Response:", r.text)