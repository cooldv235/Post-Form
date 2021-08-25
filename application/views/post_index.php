<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CRUD</title>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1>Post Form</h1>
        </div>

<div id="main-content">
    <h2>Add New Post</h2>
    <form class="post-form" action="savedata.php" method="post">

        <!-- TITLE -->
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" />
        </div>

        <!-- BODY -->
        <div class="form-group">
            <label>Body</label>
            <textarea name="body" id="" cols="35" rows="5"></textarea>
        </div>

        <!-- IMAGE -->
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" />
        </div>

        <!-- PRICE -->
        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" />
        </div>

        <!-- SUB CATEGORY -->
        <div class="form-group">
            <label>Category</label>
            <select name="class" id="select_category">
                <option value="" selected disabled>Select Category</option>
                <?php foreach($categories as $category): ?>
                <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- CATEGORY -->
        <div class="form-group">
            <label>Sub Category</label>
            <select name="class">
                <option value="" selected disabled>Select Category</option>
                <option value="1">Technology</option>
                <option value="2">Business</option>
                <option value="3">Art</option>
            </select>
        </div>

        
        
        <input class="submit" type="submit" value="Save"  />
    </form>
</div>
</div>

<!-- AJAX CODE -->
<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type='text/javascript'>

        $(document).ready(function(){
        
            $('#select_category').change(function(){
                    var category = $(this).val();

                    // console.log(category);

                        $.ajax({
                            data: {category: category},
                            dataType: 'json',
                            url:'<?php echo base_url()?>welcome/get_sub_categories',
                            method: 'POST',
                            success: function(response){
                                    console.log(response)
                                    // var len = response.length;
                                    // console.log(len)

                                    // var name = response[0].name;
                                    // console.log(name)

                                    // if(len > 0){
                                    //     var id = response[0].id;
                                    //     var name = response[0].name;

                                    //     alert(id);
                                    // }
                            },
                            failure: function(errMsg) {
                                console.log(errMsg)
                            }
                    });
                });
        });
 </script>

</body>
</html>
