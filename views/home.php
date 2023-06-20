<?php
    include 'app/db_connection.php';
    if($_SESSION['logged_in'] == true){  
    include 'app/list.php';

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Shopping List</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      </head>
  <body>
    
        <nav class="navbar bg-light">
            <div class="container">
                <span class="navbar-brand mb-0 h1"><?php echo $_SESSION['username'];?></span>
                <div class="d-flex justify-content-end logout-btn"><a href="app/logout.php">Logout</a></div>
            </div>
        </nav>
    

       
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                
                            <div id="add-btn" class=" d-flex justify-content-center mt-5">
                                    <span  class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add Todo</span>    
                            </div>
                            <div id="add-list-form" class="mt-5">
                                <form action="app/todo.php" method="post" >
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="add-list" name="add-list" placeholder="Enter your todo here"  >
                                        <button class="btn btn-primary" name="add-list-btn" id="add-list-btn" type="submit">Add</button>
                                    </div>
                                </form>
                            </div>
                  


                    <main>
                        <div class="shopping">
                          <h2 class="shopping__title">Shopping List</h2>
                          <ul class="shopping__checklist">
                            <li class="shopping__item">
                                <?php while($row = mysqli_fetch_assoc($s_query)){?>
                              <input type="checkbox" id="<?php $row['id']?>" class="shopping__check" />
                              <label for="<?php $row['id']?>" class="shopping__label"><?php echo $row['list'];?></label>
                              <form action="app/list.php?id=<?php echo $row['id'];?>" method="post">
                                <button class="btn btn-primary">edit</button>
                            </form>
                            <form action="app/list.php?id=<?php echo $row['id'];?>" method="post">
                                <button class="btn btn-danger">delete</button>
                            </form>
                              
                            <?php }?> 
                            </li>
                          </ul>
                        </div>
                      </main>

                   
                </div>
            </div>
        </div>
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    
    <script>
        $(document).ready(function(){
            $( "#add-btn" ).click(function() {
                    $("#add-list-form").toggle();   
            });
        });
    </script>
  </body>
</html>

<?php
    }else{
        header("location:http://localhost/my_shopping_list/index.php?msg=login_first");
    }
?>