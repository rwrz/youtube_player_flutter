// Copyright 2020 Sarbagya Dhaubanjar. All rights reserved.
// Use of this source code is governed by a BSD-style license that can be
// found in the LICENSE file.

/// Defines player flags for [YoutubePlayer].
class YoutubePlayerFlags {
  /// If set to true, hides the controls.
  ///
  /// Default is false.
  final bool hideControls;

  /// Is set to true, controls will be visible at start.
  ///
  /// Default is false.
  final bool controlsVisibleAtStart;

  /// Define whether to auto play the video after initialization or not.
  ///
  /// Default is true.
  final bool autoPlay;

  /// Mutes the player initially
  ///
  /// Default is false.
  final bool mute;

  /// if true, Live Playback controls will be shown instead of default one.
  ///
  /// Default is false.
  final bool isLive;

  /// If true, hides the YouTube player annotation. Default is false.
  ///
  /// Forcing annotation to hide is a hacky way. Although this shouldn't be against Youtube TOS, the author doesn't guarantee
  /// and won't be responsible for any casualties regarding the YouTube TOS violation.
  ///
  /// Changing this flag will have no effect on iOS.
  ///
  /// Default is false.
  final bool forceHideAnnotation;

  /// Hides thumbnail if true.
  ///
  /// Default is false.
  final bool hideThumbnail;

  /// Disables seeking video position when dragging horizontally.
  ///
  /// Default is false.
  final bool disableDragSeek;

  /// Enabling this causes the player to play the video again and again.
  ///
  /// Default is false.
  final bool loop;

  /// Enabling causes closed captions to be shown by default.
  ///
  /// Default is true.
  final bool enableCaption;

  /// Specifies the default language that the player will use to display captions. Set the parameter's value to an [ISO 639-1 two-letter language code](http://www.loc.gov/standards/iso639-2/php/code_list.php).
  ///
  /// Default is `en`.
  final String captionLanguage;

  /// Use a remote player with server.php (provided) to bypass copyright video problems
  ///
  /// Default is "" (empty)
  final String serverUrl;

  /// Video should starts at "start" timestamp
  ///
  /// Default is 0
  final int start;

  /// Video should ends at "end" timestamp
  ///
  /// Default is null
  final int end;

  /// Forces High Definition video quality when possible
  ///
  /// Default is false.
  final bool forceHD;

  /// Creates [YoutubePlayerFlags].
  const YoutubePlayerFlags({
    this.hideControls = false,
    this.controlsVisibleAtStart = false,
    this.autoPlay = true,
    this.mute = false,
    this.isLive = false,
    this.forceHideAnnotation = false,
    this.hideThumbnail = false,
    this.disableDragSeek = false,
    this.enableCaption = true,
    this.captionLanguage = 'en',
    this.loop = false,
    this.serverUrl = "",
    this.start = 0,
    this.end,
    this.forceHD = false,
  });

  /// Copies new values assigned to the [YoutubePlayerFlags].
  YoutubePlayerFlags copyWith({
    bool hideControls,
    bool autoPlay,
    bool mute,
    bool showVideoProgressIndicator,
    bool isLive,
    bool forceHideAnnotation,
    bool hideThumbnail,
    bool disableDragSeek,
    bool loop,
    bool enableCaption,
    bool forceHD,
    String captionLanguage,
  }) {
    return YoutubePlayerFlags(
      autoPlay: autoPlay ?? this.autoPlay,
      captionLanguage: captionLanguage ?? this.captionLanguage,
      disableDragSeek: disableDragSeek ?? this.disableDragSeek,
      enableCaption: enableCaption ?? this.enableCaption,
      forceHideAnnotation: forceHideAnnotation ?? this.forceHideAnnotation,
      hideControls: hideControls ?? this.hideControls,
      hideThumbnail: hideThumbnail ?? this.hideThumbnail,
      isLive: isLive ?? this.isLive,
      loop: loop ?? this.loop,
      mute: mute ?? this.mute,
      forceHD: forceHD ?? this.forceHD,
    );
  }
}
