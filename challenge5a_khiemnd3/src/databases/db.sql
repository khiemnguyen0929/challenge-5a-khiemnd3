CREATE TABLE `account` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` enum('student','teacher','admin') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `account` (`id`, `username`, `password`, `fullname`, `email`, `phone`, `type`) VALUES
(1, 'teacher1', '$2y$10$aYk4E551XweNtlwdxOT35uamhPVXdM/bavqwZlt/J8UIDi9AeZlLe', 'Teacher 1', 'teacher1@vcs.com', '0901123451', 'teacher'),
(2, 'teacher2', '$2y$10$NIZWCEeURkgVJ0xhqe0A5eCb7aqw4s7Bb1HTwLwypF9b4abeIxv/e', 'Teacher 2', 'teacher2@vcs.com', '0901123452', 'admin'),
(3, 'student1', '$2y$10$RlxM.ZpQO5np803oQx168.K3hKqahqIpSQ9MmJxmj5EqGQJaffU.6', 'Student 1', 'student1@vcs.com', '0901123453', 'student'),
(4, 'student2', '$2y$10$DptkWZ6rmfQ/LuKMWi/SwefHgaHR8yh8R7xYZmVFnDHJN0.DQ6oWy', 'Student 2', 'student2@vcs.com', '0901123454', 'student');

CREATE TABLE `avatar` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `avt` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `avatar` (`id`, `avt`) VALUES
(1, '/uploads/default.png'),
(2, '/uploads/default.png'),
(3, '/uploads/default.png'),
(4, '/uploads/default.png');

CREATE TABLE `exercise` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `authorId` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `deadline` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `exercise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

CREATE TABLE `submit_exercise` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `exerciseId` int(11) NOT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `submit_exercise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `account`
  ADD `message` varchar(255);

CREATE TABLE `challenge` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `challenge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;