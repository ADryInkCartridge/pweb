<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style = "background-color: #F1F0FF">
    <section class="vh-100" >
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                  <div class="card-body p-lg-5 m-5  text-black">
      
                    <form name="login"   onsubmit="return validateForm()">
    
                      <h5 class="fw-normal" style="letter-spacing: 1px;">Sign In With Your Email Address</h5>
                      <p class="mb-5 pb-lg-2 small">Don't have an account yet? <a href="#" style="color: #9B95E6;">Register here</a></p>
                      <div class="form-outline mb-4">
                        <label class="form-label">Email address</label>
                        <input type="email" id="email" name='email' style = "background-color: #F1F0FF" class="form-control form-control-lg rounded-pill" />
                      </div>
    
                      <div class="form-outline mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" id="password" name="password" style = "background-color: #F1F0FF" class="form-control form-control-lg rounded-pill" />
                      </div>
    
                      <div class="pt-1 d-flex flex-row-reverse">
                        <a onclick="validateForm()" href="#" class="text-muted text-right text-black">Sign In</a>
                      </div>
    
                      <a class="small text-muted" href="#">Forgot your password?</a>
                    </form>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <script>
        function validateForm() {
          if (document.forms["login"]["email"].value == "") {
            alert("Email tidak boleh kosong");
            document.forms["login"]["email"].focus();
            return false;
          }
          else if (document.forms["login"]["password"].value == "") {
            alert("Password Tidak Boleh Kosong");
            document.forms["login"]["password"].focus();
            return false;
          }
          else 
            window.location.href = "e_payment_list.php";
        }
      </script>
</body>
</html>