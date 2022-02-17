<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">


    <title>Extractions !</title>
</head>

<body>
    <!-- Buttons -->
    <div class="row mb-4 mt-4">
        <div class="col text-center">
            <a href="export_inscription" class="btn btn-lg btn-success" data-toggle="modal" data-target="#basicModal">Extraction Inscriptions</a>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col text-center">
            <a href="#" class="btn btn-lg btn-success" data-toggle="modal" data-target="#basicModal">Extraction Programmation Avec Coefficient</a>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col text-center">
            <a href="#" class="btn btn-lg btn-success" data-toggle="modal" data-target="#basicModal">Extraction Planification </a>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col text-center">
            <a href="#" class="btn btn-lg btn-success" data-toggle="modal" data-target="#basicModal">Extraction Chiffre D'affaire </a>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col text-center">
            <a href="#" class="btn btn-lg btn-success" data-toggle="modal" data-target="#basicModal">Extraction Notes Epreuves </a>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col text-center">
            <a href="#" class="btn btn-lg btn-success" data-toggle="modal" data-target="#basicModal">Extraction Honoraires </a>
        </div>
    </div>
    <!-- basic modal -->
    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Basic Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <select class="selectpicker" data-live-search="true">
                        <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
                        <option data-tokens="mustard">Burger, Shake and a Smile</option>
                        <option data-tokens="frosting">Sugar, Spice and all things nice</option>
                    </select>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="export_inscription.php"> <button type="button" class="btn btn-primary">Submit</button></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
</body>

</html>