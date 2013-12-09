
(function (chattr, $, undefined) {

	function getBaseUrl() {
		var url = "http://" + window.location.host;

		switch(url) {
			case 'http://localhost':
				url += "/chattr/public";
				break;
		}

		return url;
	}

	function postIdAndUsername(relativeUrl, userid, username) {
		var url = getBaseUrl();
		url += relativeUrl;

		$.post(url, {contact_id: userid, username: username}, function (data) {
			if (data.error) {
				alert('Error: ' + data.error);
			}
		}).fail(function () {
			console.error('Error: unable to send POST request to "' + url + '"');
		});
	}

	// Accept a friend request
	chattr.acceptRequest = function (userid, username) {
		postIdAndUsername("/user/acceptrequest", userid, username);
	}

	// Ignore a friend request
	chattr.ignoreRequest = function (userid, username) {
		postIdAndUsername("/user/ignorerequest", userid, username);
	}

	// Decline a friend request
	chattr.declineRequest = function (userid, username) {
		postIdAndUsername("/user/declinerequest", userid, username);
	}

}(window.chattr = window.chattr || {}, jQuery));
