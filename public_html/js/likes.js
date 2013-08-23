var Likes = {
	likeUrl : '/like/like',
	unlikeUrl : '/like/unlike',
	like : function(likeClass, type, user, name, action) {
		action = action || 'like';

		var likeName = user;
		if (name && 0 !== name.length) {
			likeName += '_' + name;
		};

		var url = this.likeUrl;
		var defaultButton = 'like';
		var newButton = 'unlike';
		if ('unlike' == action) {
			url = this.unlikeUrl;
			defaultButton = 'unlike';
			newButton = 'like';
		}

		$('.' + likeClass + '-' + defaultButton + '_' + likeName).hide();
		$('.' + likeClass + '-like-loading_' + likeName).show();

		var data = {
			type : type,
			user : user,
			name : name,
		};

		$.getJSON(url, data, function(response) {
			if ('ok' == response.result) {
				$('.' + likeClass + '-like-loading_' + likeName).hide();
				$('.' + likeClass + '-' + newButton + '_' + likeName).show();
			}
		})
	},

	unlike : function(likeClass, type, user, name) {
		this.like(likeClass, type, user, name, 'unlike');
	}
}


