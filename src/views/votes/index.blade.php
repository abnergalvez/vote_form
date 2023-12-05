<!doctype html>
<html lang="es" data-bs-theme="auto">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $app }}</title>
    <script src="public/css/main.css"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
    </style>
  </head>
  <body>
    
<main>
  <div class="container py-4">
    <header class="pb-3 mb-3 border-bottom">
      <a href="/" class="d-flex align-items-center text-body-emphasis text-decoration-none">
        <span class="fs-4">{{ $title }}</span>
      </a>
    </header>
    <div class="row">
        <div class="mx-1 col-md-8 p-3 mb-4 bg-body-tertiary rounded-3">
            <div class="container-fluid py-1">
                <p><strong>Importante:</strong>  {{ $description }}</p>
                <hr>
                @include('errors')
                @include('form')
            </div>
        </div>
        
        <div class="mx-1 col-md-3 p-4 mb-4 bg-body-tertiary rounded-3">
            <div class="container-fluid py-1">
                @include('candidates')
            </div>
        </div>
    </div>


    <footer class="pt-3 mt-4 text-body-secondary border-top">
      &copy; 2023
    </footer>
  </div>
</main>
<script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
<script src="public/js/functions.js"></script>
<script src="public/js/validations.js"></script>
<script src="public/js/main.js"></script>
<script 
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
  crossorigin="anonymous"></script>

    </body>
</html>

