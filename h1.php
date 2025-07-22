<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gradient Color Range Input</title>
  <!-- Bootstrap CSS -->
 
  <style>
    /* Custom Styles */
    .gradient-card {
      background-color: rgb(248, 230, 233);
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .color-range {
      -webkit-appearance: none;
      width: 100%;
      height: 15px;
      border-radius: 5px;
      background: linear-gradient(to right, white,white);
      outline: none;
      margin-bottom: 10px;
     
    }
    /* Style for range input thumb (button) */
    .color-range::-webkit-slider-thumb {
      -webkit-appearance: none;
      appearance: none;
      width: 20px;
      height: 20px;
      background-color: pink; /* Change thumb color */
      border-radius: 50%; /* Make it circular */
      cursor: pointer;
    }
  </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card gradient-card">
              <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                  <h5 class="card-title">Choose Gradient Color</h5>
                  <input type="range" min="0" max="100" value="0" id="r1" class="color-range" style="width: 190%;">
                  <p><span id="sliderValue"></span></p>
                </div>
                <button type="button" style="background-color: pink; border: 0px; border-radius: 10%; color: black; height: 30px; width: 70px;padding: auto; margin-top: 30px; padding: 2px;"><h6>Apply</h6></button>
              </div>
            </div>
          </div>
        </div>
      </div>



<!-- Bootstrap JS -->
<script>
    var slider = document.getElementById("r1");
    var output = document.getElementById("sliderValue");
    output.innerHTML = slider.value;
    
    slider.oninput = function() {
      output.innerHTML = this.value;
    }
    document.getElementById('r1').addEventListener('input', function() {
    var value = (this.value - this.min) / (this.max - this.min);
    this.style.background = 'linear-gradient(to right,  pink 0%,rgb(180,166,168) ' + (value * 100) + '%, white ' + (value * 100) + '%, white 100%)';
  });
</script>
</body>
</html>
