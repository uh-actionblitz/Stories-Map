<!DOCTYPE html>
<html>
  <head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <style>
      .sidestory {
        background-color: #eee;
        padding: 20px;
      }
      .name {
        font-size: 18px;
        font-weight: bold;
      }

    </style>
  </head>
  <body>
    <div class="content-fluid">
      <div class="col-md-8">
        <P>
          MAP WILL GO HERE
        </p>
        <button class="btn btn-primary" onclick="getStory(7)">Get Story</button>
      </div>
      <div class="col-md-4 sidestory" id="sidestory">
      </div>
    </div>
  </body>


  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <script>
      function getStory(storyNum) {
          $.ajax({
          type: "GET",
          url: "map.php",
          data: {action: 'test'},
          dataType:'JSON',
          success: function(data){
              //data = JSON.stringify(data);
              console.log($('#story-name').length);
              if ($('#story-name').length == 0) {
                $("#sidestory").append("<div class='name'><span id='story-name'>" + data[storyNum].name + "</span>'s Story</div>");

                if (data[storyNum].video != '') {
                  $("#sidestory").append('<div class="video"><iframe src="' + data[storyNum].video + '" frameborder="0" allowfullscreen></iframe></div>');
                }
              }

          }
      });

      }
  </script>
</html>
