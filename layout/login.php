
    <div class="container-fluid">
        <div class="card mx-auto my-5  col-4 py-3">
            <div class="card-header">
                <h3>Login</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
            </div>
            <div class="card-foot d-flex justify-content-around">
                <button id="#login" class="btn btn-primary" onclick="login()">Login</button>

            <a href="register.php">Registrarse</a>
            </div>
            
        </div>
    </div>
    <script>
        function login() { 
                    let email = $('#email').val();
                    let password = $('#password').val();
                $.ajax({
                    type: 'GET',
                    url: '/api/users/api-users.php?accion=loguear&email='+email+'&password='+password,
                    success: function(msg) {
                        window.location.href = "/";
                    },
                    error: function() {
                    alert("Falloo en la sesion");
                    }
                });

         }


                
    </script>
