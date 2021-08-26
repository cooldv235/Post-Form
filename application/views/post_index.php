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
    <?php echo form_open_multipart('welcome/index','class="post-form"'); ?>

        <?php if($this->session->flashdata('post_created')): ?>
            <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
        <?php endif; ?>

        <div id="errors" style="color:red" >
            <?php echo validation_errors(); ?>
        </div>

        <!-- TITLE -->
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="<?php echo set_value('title');?>"/>
        </div>

        <!-- BODY -->
        <div class="form-group">
            <label>Body</label>
            <textarea name="body" id="" cols="35" rows="5"><?php echo set_value('body');?></textarea>
        </div>

        <!-- IMAGE -->
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="userfile" size="20" />
        </div>

        <!-- PRICE -->
        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" value="<?php echo set_value('number');?>"/>
        </div>

        <!-- ADDRESS -->
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" value="<?php echo set_value('address');?>" />
        </div>

        <!-- SUB CATEGORY -->
        <div class="form-group">
            <label>Category</label>
            <select name="category" id="select_category">
                <option value="" selected disabled>Select Category</option>
                <?php foreach($categories as $category): ?>
                <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- CATEGORY -->
        <div class="form-group">
            <label>Sub Category</label>
            <select name="sub_category" id="select_sub_category">
                <option value="" selected disabled>Select Sub Category</option>
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
                    $('#select_sub_category').empty();
                    var category = $(this).val();

                    // console.log(category);

                        $.ajax({
                            data: {category: category},
                            dataType: 'json',
                            url:'<?php echo base_url()?>welcome/get_sub_categories',
                            method: 'POST',
                            success: function(response){
                                    console.log(response)
                                    var len = response.length;
                                    // console.log(len)

                                    // var name = response[0].name;
                                    // console.log(name)

                                    if(len > 0){
                                        for(var i = 0; i < len; i++){
                                            $('#select_sub_category').append('<option value="' + response[i].id +'">' + response[i].name + '</option>');
                                        }
                                    } else {
                                        var nothing = 'No Sub Category Available';
                                        $('#select_sub_category').append('<option value="0">' + nothing + '</option>');
                                    }
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
