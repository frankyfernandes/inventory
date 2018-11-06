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
                    console.log(response);
                    res = JSON.parse(response);
                    console.log(res);
                    if(res.message == undefined){
                        var rows = "";
                        for(i=0;i<res.length;i++){
                            j = i+1;
                             rows += "<tr><td>"+j+"</td><td>"+res[i].manufacturer+"</td></tr>";
                        }
                        $('#manufacturer_tbody').html(rows);
                    }
                }
            });

            $.ajax({
                url:'../controllers_models/Managecarmodel.php'
            });
        });
    </script>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <table class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Manufacturer</th>
                        </tr>
                    </thead>
                    <tbody id="manufacturer_tbody">

                    </tbody>
                </table>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <th>Sr.No.</th>
                            <th>Manufacturer</th>
                            <th>Model</th>
                            <th>Count</th>
                        </tr>
                    </thead>
                    <tbody id="model_tbody">
                    
                    </tbody>
                </table>
            </div>     
        </div>

    </div>
<?php
    require_once('footer.php');
?>