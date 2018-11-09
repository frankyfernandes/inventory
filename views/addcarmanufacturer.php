<?php
    require_once('top.php');
?>
    <script>
        $(document).ready(function(){
            $('#submit').click(function(){
                var manufacturer = $('#manufacturer').val();
                $.ajax({
                    url:'../controllers_models/Managecarmanufacturer.php',
                    data:{'manufacturer':manufacturer},
                    type:'POST',
                    success:function(response){
                        $('#response_msg').html(response);
                    },
                    error:function(){
                        $('#response_msg').html('Something went wrong.');
                    }
                });
            });
        });
    </script>
    <div class="container-fluid">
       <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Manufacturer</label>
                    <input type="text" class="form-control" id="manufacturer">
                </div>
                <div class="form-group">
                    <input type="button" class="btn btn-success" id="submit" value="Submit">
                </div>
                <div class="form-group">
                    <span id="response_msg"></span>
                </div>
            </div>
            <div class="col-md-4"></div>
       </div>
    </div>
<?php
    require_once('footer.php');
?>