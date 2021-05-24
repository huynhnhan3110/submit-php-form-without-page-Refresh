<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bình luận Không chuyển trang</title>
</head>
<body>
<h1>Submit form without Page Refresh</h1>
    <p id="responsetext"></p>
<form id="comment-form">
    Tên: <input type="text" name="name" class="form-data"><br>
    Email: <input type="text" name="email" class="form-data"><br>
    Giới tính: Nam <input type="radio" name="gender" value="nam" class="form-data">
               Nữ <input type="radio" name="gender" value="nu" class="form-data"><br>
    Textarea: <textarea cols="30" rows="20" name="comment" class="form-data"></textarea><br>
    
    <button type="button" name="" id="submitBtn" onclick="send_data()">Thêm bình luận</button>
</form>
    <script>
       function send_data() {
            var input = document.getElementsByClassName("form-data");
            var form_data = new FormData();
            for(var i = 0; i<input.length; i++) {
                if(input[i].type == 'radio' && input[i].checked == false) {
                    continue;
                }
                form_data.append(input[i].name, input[i].value);
            }

           
            var httpxmlrequest = new XMLHttpRequest();
            httpxmlrequest.onreadystatechange = function() {
                if(httpxmlrequest.readyState == 4 && httpxmlrequest.status == 200) {
                   document.getElementById("comment-form").reset();
                   document.getElementById("responsetext").innerHTML = httpxmlrequest.responseText;

                   setTimeout(() => {
                    document.getElementById("responsetext").innerHTML = "";
                   }, 3000);
                }
            }

            httpxmlrequest.open("GET", "xu_ly_them.php?name="+form_data.get('name')
                                                        +"&email="+form_data.get('email')
                                                        +"&gender="+form_data.get('gender')
                                                        +"&comment="+form_data.get('comment')
                                ,"true");
            httpxmlrequest.send();
            
       }
    </script>
</body>
</html>