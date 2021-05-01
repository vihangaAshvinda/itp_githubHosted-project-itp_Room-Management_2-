<!DOCTYPE HTML>
<html>
    <head>
        <title>Inventory Management - Add Menu</title>
        
        <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" >
        <link rel="stylesheet" href="{{ asset('css/diningStyles.css') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="http://parsleyjs.org/dist/parsley.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- <link href = "/css/invCreate.css" rel="stylesheet"> -->
        <script src = "https://kit.fontawesome.com/85c9cbf9ed.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            <div class = "header">
            <a href = "#home">
                <img src="{{ asset('pictures/SSLogo.jpg') }}" class="logo" height="80px" width="160px" >
            </a><br>
            <font size = "18" style="font-family:century gothic;" color="white" align="center"> Shereen Chalet <b> Kalpitiya </b> </font>
            </div>
      </header>

      <div class = "topnav">
        <a href  = "#RoomBooking">Room Booking</a>
        <a href  = "#Event">Event Management</a>
        <a href  = "#Emp">Employee Management</a>
        <a href  = "../RM">Room Management</a>
        <a href  = "#Maint">Maintenance</a>
        <a href  = "#Dining">Dining</a>
        <a href  = "#Inv">Inventory</a>
        <a href  = "#Fin">Financial</a>
      </div>

      <div class="container-fluid">
        <hr class = "line2"><br>
        <a href = "/SCHome" style="font-family:calibri;font-size:18px;"> Home  </a>
        <text> > </text>
        <a href = "#Inv" style="font-family:calibri;font-size:18px;"> Inventory Management </a>
        <text> > </text>
        <a href = "#New" style="font-family:calibri;font-size:18px;"> New Entry </a>
        <a href = "#useraccount" target="_blank">
        <button class = "bttn1"><i class="fas fa-user"></i>  My Account</button>
        </a><br><br>
        <hr class = "line2">
      </div>

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="menuBody">
                    <h2 class="menu-title mb-4">Add New Menu</h2>
                    <form method="post" id="#validate_form" action="{{ route('dinein.store') }}" data-parsley-validate="">
                    @csrf <!-- {{ csrf_field() }} -->

                    <div class="form-group">
                        <label for="country">Country</label>
                        <select class="form-control" id="country" name="country">
                        <option>Sri Lanka</option>
                        <option>India</option>
                        <option>Italy</option>
                        <option>Chiness</option>
                        <option>Thailand</option>
                        </select>
                    </div>
                    
                    <label for="category" class="font-weight-bold">Select Category</label>
                    
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="dish_name" name="category" >
                        <label class="custom-control-label" for="dish_name">Dishes</label>
                    </div>


                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="Dessert_name" name="category" checked>
                        <label class="custom-control-label" for="Dessert_name">Dessert</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="Beverage_name" name="category" checked>
                        <label class="custom-control-label" for="Beverage_name">Beverage</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="other_Food_name" name="category" checked>
                        <label class="custom-control-label" for="other_Food_name">Other Food</label>
                    </div><br>

                    
                    <div class="form-group">
                        <label for="code">Meal Code</label>
                        <input type="text" class="form-control " id="code" placeholder="" name="meal_code" required data-parsley-minlength="3" data-parsley-trigger="keyup">
                    </div>

                    <div class="form-group">
                        <label for="menu">Menu</label>
                        <textarea class="form-control" id="menu" placeholder="" name="menu" required data-parsley-trigger="keyup"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="small">Small Poriton Price</label>
                        <input type="text" class="form-control" id="small" placeholder="" name="small_portion_price" required data-parsley-type="digits" data-parsley-trigger="keyup">
                    </div>

                    <div class="form-group">
                        <label for="medium">Medium Poriton Price</label>
                        <input type="text" class="form-control" id="medium" placeholder="" name="medium_portion_price" 	data-parsley-type="digits" data-parsley-trigger="keyup">
                    </div>

                    <div class="form-group">
                        <label for="laege">Laege Poriton Price</label>
                        <input type="text" class="form-control" id="laege" placeholder="" name="large_portion_price" data-parsley-type="digits" data-parsley-trigger="keyup">
                    </div>

                    <button type="submit" id="#submit" class="btn btn-primary btn-lg btn-block submit-btn">Submit</button>

                    
                    </form>
                </div>
            </div>
            <hr class = "line2">
        </div>
   </body>
   
</html>
<script>
    $(document).ready(function(){

        $('#validate_form').parsley();

        $('#validate_form').on('submit', function(event){
            event.preventDefault();

            if($('#validate_form').parsley().isValid())
            {
                $.ajax({
                        url: '{{ route('dinein.store') }}',
                        method:"POST",
                        data:$(this).serialize(),
                        dataType:"json",
                        beforeSend:function()
                        {
                            $('#submit').attr('disabled', 'disabled');
                            $('#submit').val('Submitting...');
                        },

                        success:function(data)
                        {
                            $('#validate_form')[0].reset();
                            $('#validate_form').parsley().reset();
                            $('#submit').attr('disabled', false);
                            $('#submit').val('Submit');
                            alert(data.success);
                        }
                });
            }
        });

    });
</script>