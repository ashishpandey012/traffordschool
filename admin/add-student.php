<?php
include('include/header.php');
?>
    <section>
        <div class="container">
            <div class="main-content silver-bg mx-auto p-4 rounded-5">
                <div class="heading text-center">
                    <h2>Student Form</h2>
                </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <input type="text" class="form-control name"  placeholder="Student Name">
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="email" class="form-control email"  placeholder="Student Email">
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="tel" class="form-control number"  placeholder="Student Mobile No.">
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="file" class="form-control image" placeholder="Student Image">
                        </div>
                        <div>
                            <button class="btn btn-md btn-success save">SAVE</button>
                        </div>
                    </div>

            </div>
        </div>
    </section>
    <script>
        $(document).ready(function(){
            $(".save").on("click", function(){
                var name = $(".name").val();
                var email = $(".email").val();
                var mobile = $(".number").val();
                var stdimg = $(".image").val();

                if(name != ""){
                    if(email != ""){
                        if(mobile != ""){
                            if(stdimg != ""){
                                $.ajax({
                                    type:'post',
                                    data: {
                                        name: name,
                                        email: email,
                                        mobile: mobile,
                                    },
                                    url:'functions/student-save.php',
                                    success:function(e){
                                        alert(e);
                                    }
                                });
                            }else{
                                alert("Image Not uploaded");
                            }
                        }else{
                            alert("Mobile No. is Empty");
                        }
                    }else{
                        alert("Email is Empty");
                    }
                }else{
                    alert("Name is Empty");
                }
            });
        });
    </script>
    
<?php
include('include/footer.php');
?>