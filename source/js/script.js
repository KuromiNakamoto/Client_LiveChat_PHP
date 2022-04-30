$(document).ready(function () {
	$('#msg-list').load("/source/client/load_msg.php");
	scrollChat();

	var i = 0;

	setInterval(function () {
		i++;

		$('#msg-list').load("/source/client/load_msg.php");

		scrollChat();

		console.log("Load " + i);
	}, load_timeout)

	$('#msg-send').submit(function (e) {
		e.preventDefault();

		if ($('#msg-sendbox').val() != "") {
			let msg = $('#msg-sendbox').val();

			// replace html
			msg = msg.replace("<", "&lt;");
			msg = msg.replace(">", "&gt;");

			$.ajax({
				type: "POST",
				url: "/source/client/add_msg.php",
				data: {
					username: $('#user_session').val(),
					message: msg
				},
				dataType: 'json',
				success: function (response) {
					if (response.status != "thanhcong") {
						alert("An error has occurred !");
					} else {
						console.log("Send " + msg + " success !");
					}
				},
				error: function (error) {
					console.log(error);
				}
			});

			$('#msg-sendbox').val("");
			$('#msg-sendbutton').prop('disabled', !0);
		}
	});
});

function scrollChat() {
	// let _element = document.getElementById("msg-list");
	// _element.scrollTop = _element.scrollHeight;

	$('#msg-list').animate({ scrollTop: $(document).height() }, "slow");
	return true;
}

function checkMsg(input) {
	if ($(input).val() != "") {
		$('#msg-sendbutton').prop('disabled', !1);
	} else {
		$('#msg-sendbutton').prop('disabled', !0);
	}
}