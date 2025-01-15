<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container p-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card p-5 bg-success" >
                    <div class="card-body">
                    <a href="{{route('admin.withdraw')}}" class="text-decoration-none">
                          <h5 class="card-title text-center text-white">withdraws</h5></a>
                    
                    </div>
                  </div>
            </div>
            <div class="col-md-6">
                <div class="card p-5 bg-success" >
                    <div class="card-body">
                  <a href="{{route('admin.requests')}} " class="text-decoration-none">  <h5 class="card-title text-center text-white">packages request</h5></a>  
                    </div>
                  </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>