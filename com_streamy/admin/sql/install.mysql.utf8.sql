CREATE TABLE `#__streamy_channel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `typeid` int(11) NOT NULL,
  `width` int(11) NOT NULL DEFAULT '0',
  `height` int(11) NOT NULL DEFAULT '0',
  `chaturl` varchar(255) NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

CREATE TABLE `#__streamy_channeltype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

INSERT INTO `#__streamy_channeltype`
(`name`,
`url`,
`ordering`,
`published`)
VALUES
('Twitch',
'<iframe src="https://player.twitch.tv/?channel={name}" frameborder="0" scrolling="no" height="{height}" width="{width}"></iframe>',
1,
1);

INSERT INTO `#__streamy_channeltype`
(`name`,
`url`,
`ordering`,
`published`)
VALUES
('YouTube',
'<iframe width="{width}" height="{height}" src="https://www.youtube.com/embed/{name}" frameborder="0" allowfullscreen></iframe>',
2,
1);

INSERT INTO `#__streamy_channeltype`
(`name`,
`url`,
`ordering`,
`published`)
VALUES
('myvideo',
'<iframe src="https://www.myvideo.de/embed/{name}" style="width:{width}px;height:{height}px;border:0px none;padding:0;margin:0;" width="{width}" height="{height}" frameborder="0" scrolling="no"></iframe>',
3,
1);