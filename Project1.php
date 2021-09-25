<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Form Project</title>
  </head>
  <body>
    <div class="container">
        <form>

            <div class="row">
                    <div class="col">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="fname">
                    </div>
                    <div class="col">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lname">
                    </div>

                    <div class="mb-3">
                        <label for="fname" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" 
                    </div>
            </div>

            <div class="col-md-6">
                <label for="inputCity" class="form-label">City</label>
                <input type="text" class="form-control" id="inputCity">
            </div>

            <div class="col-md-4">
                <label for="inputState" class="form-label">State</label>
                <select id="inputState" class="form-select">
                <option>Kansas</option>
                <option>Nebraska</option>
                <option selected>Michigan</option>
                <option>Arkansas</option>
                <option>Colorado</option>
                </select>
            </div>

            <div class="col-md-2">
                <label for="inputZip" class="form-label">Zip</label>
                <input type="text" class="form-control" id="inputZip">
            </div>

            <div class="col-2">            
                <div class="row">
                    <div class="col">
                        <input class="form-check-input" type="radio" name="genderOptions" id="male" value="option1">
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="col">
                        <input class="form-check-input" type="radio" name="genderOptions" id="female" value="option2">
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                </div>
            </div> 
            
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>

        </form>

    </div>
  </body>
</html>
