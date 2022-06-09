/** 
 * CONFIGURATION
 */

var YOUTUBE_PLAYER,
	YOUTUBE_PLAYER_EL = "video-placeholder", // Don't have to specify "#" here
	START_TIME = "0:00",
	END_TIME = endtime,
	PLAY_EL = "#play",
	PAUSE_EL = "#pause",
	PROGRESS_BAR_EL = "#progress-bar",
	CURRENT_TIME_EL = "#current-time",
	DURATION_EL = "#duration";

/**
 * FUNCTIONS
 */

function onYouTubeIframeAPIReady() {
	/**
	 * Builds main YouTube API object
	 */

	YOUTUBE_PLAYER = new YT.Player(YOUTUBE_PLAYER_EL, {
		width: 0.1,
		height: 0.1,
		videoId: videoid,
		playerVars: {
			// Supported player params can be found at https://developers.google.com/youtube/player_parameters#Parameters
			controls: 0, // disable video controls on mouse over
			disablekb: 1, // disable keyboard controls
			start: minutesToSeconds(START_TIME),
			end: minutesToSeconds(END_TIME),
			autoplay: 0,
		},
		events: {
			onReady: () => initialize(START_TIME, END_TIME, YOUTUBE_PLAYER, PLAY_EL, PAUSE_EL, PROGRESS_BAR_EL,
				CURRENT_TIME_EL, DURATION_EL)
		}
	});
}


function initialize(videoStartTime, videoEndTime, playerObj, playElId, pauseElId, progressBarElId, currentTimeElId,
	durationElId) {
	/**
	 * Initializes all functions for player.
	 * The reason we check for PlayerState is because if the video ends, and a user clicks play
	 * it will start from the very beginning instead of our desired start time.
	 *
	 * More can be found https://developers.google.com/youtube/iframe_api_reference#Playback_status
	 */

	$(playElId).on('click', () => { // Set play button click handler
		playerObj.getPlayerState() === 0 // a state of 0 means 'ended'
			?
			playerObj.seekTo(minutesToSeconds(videoStartTime)) :
			null;
		playerObj.playVideo();
	});

	$(pauseElId).on('click', () => playerObj.pauseVideo()); // Set pause button click handler

	$(progressBarElId) // Set min/max values for progress bar & set mouseup and touchend handlers
		.attr('min', minutesToSeconds(videoStartTime))
		.attr('max', minutesToSeconds(videoEndTime))
		.on('mouseup touchend', e => playerObj.seekTo(e.target.value));

	playerObj.seekTo(minutesToSeconds(videoStartTime)); // Sets the progress bar to correct start time
	doUpdate(currentTimeElId, durationElId, progressBarElId, playerObj,
		videoEndTime); // Updates progress bar and timestamp

	let time_update_interval = setInterval(() => { // Creates interval for updating progress bar and timestamp
		doUpdate(currentTimeElId, durationElId, progressBarElId, playerObj, videoEndTime);
	}, 1000);
}


function doUpdate(currentTimeElId, durationElId, progressBarElId, playerObj, videoEndTime) {
	/**
	 * Updates current_time / duration
	 * Updates progress_bar
	 */

	updateTimerDisplay(currentTimeElId, durationElId, playerObj, videoEndTime);
	updateProgressBar(progressBarElId, playerObj);
}


function updateTimerDisplay(currentTimeElId, durationElId, playerObj, videoEndTime) {
	/**
	 * Updates current_time / duration
	 */

	$(currentTimeElId).text(formatTime(playerObj.getCurrentTime()));
	$(durationElId).text(formatTime(minutesToSeconds(videoEndTime)));
}


function formatTime(time) {
	/**
	 * Formats time in xx:xx format
	 */

	time = Math.round(time);
	let minutes = Math.floor(time / 60),
		seconds = time - minutes * 60;
	seconds = seconds < 10 ? '0' + seconds : seconds;
	return minutes + ":" + seconds;
}


function updateProgressBar(progressBarElId, playerObj) {
	/**
	 * Updates progress bar
	 */

	$(progressBarElId).val(playerObj.getCurrentTime());
}


function minutesToSeconds(mins) {
	/**
	 * ~~ mins param must be a str in "1:00" format ~~
	 * Converts time in xx:xx format to seconds
	 */

	let p = mins.split(":");
	return Number((Number(p[0]) * 60 + Number(p[1])).toFixed(3));
}