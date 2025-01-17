$(document).ready(function() {
    let bookingIdToCancel;

    // Show the modal and set the booking ID
    $('#cancelModal').on('show.bs.modal', function(event) {
        const button = $(event.relatedTarget); // Button that triggered the modal
        bookingIdToCancel = button.data('id'); // Extract info from data-* attributes
    });

    // Handle the cancellation
    $('#confirmCancel').click(function() {
        $.ajax({
            type: 'POST',
            url: '../../php/cancelBooking.php', // Path to your cancellation PHP script
            data: { bookingID: bookingIdToCancel },
            success: function(response) {
                // Handle success (e.g., refresh the page or remove the row)
                if (response.success) {
                    location.reload(); // Reload the page to reflect changes
                } else {
                    alert('Error cancelling booking: ' + response.message);
                }
                $('#cancelModal').modal('hide'); // Hide the modal
            },
            error: function() {
                alert('An error occurred. Please try again.');
            }
        });
    });
});
