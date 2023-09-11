$(document).ready(function() {
  $('#topic').change(function() {
    var topic = $(this).val();
    if (topic !== '') {
      $.ajax({
        type: 'POST',
        url: 'get_difficulty.php',
        data: {topic: topic},
        dataType: 'json',
        success: function(data) {
          // Populate options with difficulty levels from database
          $('#difficulty').html('');
          $.each(data, function(key, value) {
            var option = $('<option></option>').attr('value', value.id).text(value.name);
            // Disable option if already selected by user
            if (value.selected) {
              option.prop('disabled', true);
            }
            $('#difficulty').append(option);
          });
          $('#difficulty').prop('disabled', false);
        }
      });
    } else {
      $('#difficulty').html('<option value="">Select a difficulty level</option>');
      $('#difficulty').prop('disabled', true);
    }
  });
});