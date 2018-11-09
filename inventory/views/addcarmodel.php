<?php
    require_once('top.php');
?>
    <script>
        $(document).ready(function(){
            $.ajax({
                url:'../controllers_models/Managecarmanufacturer.php',
                data:{'getmanufacturers':true},
                type:'GET',
                success:function(response){
                    //console.log(response);
                    res = JSON.parse(response);
                    //console.log(res);
                    if(res.message == undefined){
                        var options = "<option value=''>Select</option>";
                        for(i=0;i<res.length;i++){
                            j = i+1;
                             options += "<option value='"+res[i].id+"'>"+res[i].manufacturer+"</option>";
                        }
                        $('#manufacturer').html(options);
                    }
                }
            });
            
            $('#submit').click(function(){
                var formdata= $('#carmodelform').serialize();
                
                $.ajax({
                    url:'../controllers_models/Managecarmodel.php',
                    data:formdata,
                    type:'POST',
                    success:function(response){
                        console.log(response);
                    }
                }); 
            });

        });
    </script>
    <div class="container-fluid">
       <form id="carmodelform">
       <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Model name:</label>
                            <input type="text" class="form-control" name="model_name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Select manufacturer:</label>
                            <select class="form-control" id="manufacturer" name="manufacturer_id"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Quantity:</label>
                            <input type="text" class="form-control" name="model_quantity">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Color:</label>
                            <input type="text" class="form-control" name="model_color">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            
                            <input type="button" class="btn btn-success" value="Submit" id="submit">
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-2"></div>
       </div>
       </form>
    </div>
<?php
    require_once('footer.php');
?>
