-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2024 at 01:17 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `talkspace`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` text NOT NULL,
  `category_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `category_added`) VALUES
(1, 'php', 'PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1993 and released in 1995. The PHP reference implementation is now produced by the PHP Group.', '2024-07-27 18:27:07'),
(2, 'JavaScript', 'JavaScript, often abbreviated as JS, is a programming language and core technology of the Web, alongside HTML and CSS. 99% of websites use JavaScript on the client side for webpage behavior. Web browsers have a dedicated JavaScript engine that executes the client code.', '2024-07-27 18:27:40'),
(3, 'React', 'React is a free and open-source front-end JavaScript library for building user interfaces based on components by Facebook Inc. It is maintained by Meta and a community of individual developers and companies. React can be used to develop single-page, mobile, or server-rendered applications with frameworks like Next.js.', '2024-08-03 16:31:31'),
(4, 'Node.js', 'Node.js is a cross-platform, open-source JavaScript runtime environment that can run on Windows, Linux, Unix, macOS, and more. Node.js runs on the V8 JavaScript engine, and executes JavaScript code outside a web browser. Node.js lets developers use JavaScript to write command line tools and for server-side scripting.', '2024-08-03 16:32:44'),
(5, 'Python', 'Python is a high-level, general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation. Python is dynamically typed and garbage-collected. It supports multiple programming paradigms, including structured, object-oriented and functional programming.', '2024-08-05 18:43:44'),
(6, 'Express.js', 'Express.js, or simply Express, is a back end web application framework for building RESTful APIs with Node.js, released as free and open-source software under the MIT License. It is designed for building web applications and APIs. It has been called the de facto standard server framework for Node.js.', '2024-08-05 18:44:44'),
(7, 'MongoDB', 'MongoDB is a source-available, cross-platform, document-oriented database program. Classified as a NoSQL database product, MongoDB utilizes JSON-like documents with optional schemas. MongoDB is developed by MongoDB Inc. and current versions are licensed under the Server Side Public License.', '2024-08-20 19:52:00'),
(8, 'Rust', 'Rust is a general-purpose programming language emphasizing performance, type safety, and concurrency. It enforces memory safety, meaning that all references point to valid memory, without a garbage collector.', '2024-08-20 19:53:20');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_username` varchar(250) NOT NULL,
  `thread_id` int(8) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_username`, `thread_id`, `comment_content`, `comment_time`) VALUES
(1, 'Yaseen khan', 4, 'See this video: https://youtu.be/84IOtc05TuA?si=eQyIqDbudOLh5PtT', '2024-08-07 15:15:13'),
(2, 'Touqeer Khan', 48, 'You have to try ChatGPT. ', '2024-08-07 17:04:51'),
(6, 'Touqeer Khan', 48, 'You have to try BlackBox AI.', '2024-08-19 15:50:55'),
(38, 'Wasam', 49, 'check it on chatGPT.', '2024-08-19 17:52:53'),
(39, 'Nabeel ahmed', 49, 'check it on Meta Ai.', '2024-08-20 16:39:16'),
(40, 'wasam', 50, 'Debugging Tips:\r\nSwitch to Development Mode: Run your React app in development mode to get a more descriptive error message. This can be done by setting NODE_ENV=development before running your app.\r\n\r\nSource Maps: Ensure that source maps are enabled. They help trace back errors in minified files to the original source code.\r\n\r\nError Decoder: Use the React error decoder link provided in the message to understand what the error code means.\r\n\r\nCommon Causes: The #185 error code typically refers to an issue with the context API or improper usage of hooks outside of a function component.', '2024-08-20 18:23:50'),
(41, 'Nabeel ahmed', 3, '\"I&apos;m also facing this error.\"', '2024-08-24 15:28:55'),
(42, 'Nabeel ahmed', 3, '\"i think chatgpt can fix this error. \"', '2024-08-24 15:29:36'),
(43, 'Wasam', 3, 'I&apos;ll try chatgpt and it fixed.', '2024-08-24 15:31:49'),
(48, 'Aryan', 56, 'The `MongoError: E11000 duplicate key error` indicates that you are trying to insert a document into a MongoDB collection where the `_id` value already exists. In MongoDB, each document must have a unique `_id` field, and this error occurs when you attempt to insert a new document with an `_id` that is already in use.\r\n\r\nHere are steps to resolve this issue:\r\n\r\n### 1. **Check Existing Documents**\r\n\r\nBefore inserting a new document, check if a document with the same `_id` already exists in the collection. You can use the following query to check:\r\n\r\n```javascript\r\ndb.myCollection.findOne({ _id: ObjectId(&apos;64edcdc97b37e7a3c5a4b5e1&apos;) })\r\n```\r\n\r\n### 2. **Generate a Unique `_id`**\r\n\r\nIf you’re manually assigning `_id` values, ensure that each `_id` is unique. MongoDB can automatically generate unique `_id` values if you omit it in the document. For example:\r\n\r\n```javascript\r\ndb.myCollection.insertOne({\r\n// Do not include the _id field here\r\nfield1: \"value1\",\r\nfield2: \"value2\"\r\n});\r\n```\r\n\r\nMongoDB will create a unique `_id` for you.\r\n\r\n### 3. **Handle Duplicate Key Errors**\r\n\r\nIf you’re using an `insertMany` operation, you can use the `ordered: false` option to continue inserting other documents even if one fails due to a duplicate key error:\r\n\r\n```javascript\r\ndb.myCollection.insertMany([doc1, doc2], { ordered: false })\r\n```\r\n\r\n### 4. **Update Existing Documents**\r\n\r\nIf you need to update an existing document instead of inserting a new one, use the `update` or `upsert` operation:\r\n\r\n```javascript\r\ndb.myCollection.updateOne(\r\n{ _id: ObjectId(&apos;64edcdc97b37e7a3c5a4b5e1&apos;) },\r\n{ $set: { field1: \"newValue\" } },\r\n{ upsert: true }\r\n);\r\n```\r\n\r\n### 5. **Debugging**\r\n\r\nTo identify the issue more clearly:\r\n- Verify that your application logic is not inadvertently trying to insert a document with a conflicting `_id`.\r\n- Check your code where `_id` values are generated or assigned to ensure they are unique.\r\n\r\n### Example Scenario\r\n\r\nIf your application is generating `_id` values manually, make sure they are unique before attempting an insertion:\r\n\r\n```javascript\r\nconst existingDoc = db.myCollection.findOne({ _id: yourGeneratedId });\r\nif (!existingDoc) {\r\ndb.myCollection.insertOne({ _id: yourGeneratedId, field1: \"value1\" });\r\n} else {\r\n// Handle the situation when _id already exists\r\n}\r\n```\r\n\r\nBy ensuring `_id` uniqueness or using MongoDB’s automatic `_id` generation, you can avoid these errors and maintain data integrity in your collection.\r\n\r\n', '2024-08-24 16:01:09'),
(49, 'Aryan', 4, 'Delete all files in mySql folders.', '2024-08-24 16:03:23'),
(50, 'Aryan', 9, 'ask chatgpt for this error.', '2024-08-24 16:04:11');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `message_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `username`, `email`, `subject`, `message`, `message_time`) VALUES
(1, 'wasam', 'wasam@gmail.com', 'hi', 'hi', '2024-08-20 15:19:03'),
(2, 'hammad', 'hammad@gmail.com', 'hi', 'hi', '2024-08-20 15:48:20');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(11) NOT NULL,
  `thread_cat` varchar(220) NOT NULL,
  `thread_username` varchar(220) NOT NULL,
  `thread_topic` varchar(1255) NOT NULL,
  `thread_question` text NOT NULL,
  `thread_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_cat`, `thread_username`, `thread_topic`, `thread_question`, `thread_time`) VALUES
(1, 'php', 'Hammad', 'Fatal error: Cannot redeclare exampleFunction() (previously declared in /path/to/your/script.php:3) in /path/to/your/script.php on line 7\n', '\n// Example code that triggers a redeclaration error\n\nfunction exampleFunction() {\n    echo \"First declaration.\";\n}\n\nfunction exampleFunction() { // This will cause the error\n    echo \"Second declaration.\";\n}\n', '2024-08-05 19:11:42'),
(2, 'php', 'Syed Wasam', 'Notice: Undefined variable: undefinedVariable in /path/to/your/script.php on line 3\n', '\n// Example code that triggers an undefined variable error\n\necho $undefinedVariable; // This will cause the error\n', '2024-08-05 19:51:50'),
(3, 'python', 'Nabeel Ahmed', ' AttributeError: \'ChildClass\' object has no attribute \'unknown_method\'\n', 'class ParentClass:\n    def __init__(self, name):\n        self.name = name\n\n    def greet(self):\n        print(f\"Hello, {self.name}!\")\n\n\nclass ChildClass(ParentClass):\n    def __init__(self, name, age):\n        super().__init__(name)\n        self.age = age\n\n    def display_age(self):\n        print(f\"{self.name} is {self.age} years old.\")\n\n\n# Attempt to call a non-existent method\nchild = ChildClass(\"Alice\", 10)\nchild.unknown_method()  # This will cause the error\n\n', '2024-08-05 19:56:36'),
(4, 'php', 'Aryan', 'Xampp Error', 'Xampp mysql shutdown unexpectedly', '2024-08-06 18:47:10'),
(9, 'JavaScript', 'Zeeshan Khan', 'JavaScript Error', 'An unexpected error occurred:  Critical Error: Unable to fetch user data. Please check your network connection and try again. If the problem persists, contact support with error code 500.\r\nStack trace:  Error: Critical Error: Unable to fetch user data. Please check your network connection and try again. If the problem persists, contact support with error code 500.\r\n    at <anonymous>:3:11\r\n    at <anonymous>:7:9\r\n', '2024-08-06 19:01:49'),
(48, 'React', 'Zeeshan Khan', 'React code Error', 'TypeError: this.incrementCount is not a function', '2024-08-07 16:59:04'),
(49, 'php', 'Wasam', 'Notice: Undefined variable: undefinedVariable in /path/to/your/script.php on line 3', 'How can i solve this problem.', '2024-08-19 17:52:13'),
(50, 'React', 'Nabeel ahmed', 'Minified React error', 'Error: Minified React error #185; visit https://reactjs.org/docs/error-decoder.html?invariant=185 for the full message or use the non-minified dev environment for full errors and additional helpful warnings.\n    at http://localhost:3000/static/js/main.chunk.js:1:22042\n    at http://localhost:3000/static/js/main.chunk.js:1:22519\n    at http://localhost:3000/static/js/main.chunk.js:1:22408\n    at Object.&lt;anonymous&gt; (http://localhost:3000/static/js/main.chunk.js:1:24325)\n    at http://localhost:3000/static/js/main.chunk.js:1:15619\n    at http://localhost:3000/static/js/main.chunk.js:1:24347\n    at Object.&lt;anonymous&gt; (http://localhost:3000/static/js/main.chunk.js:1:25322)\n    at n (http://localhost:3000/static/js/2.chunk.js:1:228)\n    at Module.445 (http://localhost:3000/static/js/main.chunk.js:1:24569)\n    at n (http://localhost:3000/static/js/2.chunk.js:1:228)\n', '2024-08-20 18:22:07'),
(51, 'php', 'Nabeel ahmed', 'Fatal error', 'Fatal error: Uncaught Error: Call to a member function fetch_assoc() on boolean in /var/www/html/index.php:45\nStack trace:\n#0 {main}\n  thrown in /var/www/html/index.php on line 45\n', '2024-08-20 18:25:09'),
(52, 'php', 'Nabeel ahmed', 'Notice: Undefined variable: undefinedVariable in /path/to/your/script.php on line 3', 'How can i solve this problem.', '2024-08-23 16:38:13'),
(53, 'php', 'Nabeel ahmed', 'Fatal error: Uncaught Error: Call to a member function fetch_assoc() on boolean in /var/www/html/index.php:45 Stack trace: #0 {main} thrown in /var/www/html/index.php on line 45', 'Solve this problem please.', '2024-08-24 14:30:44'),
(54, 'php', 'Nabeel ahmed', ' // Example code that triggers a redeclaration error function exampleFunction() { echo \"First declaration.\"; } function exampleFunction() { // This will cause the error echo \"Second declaration.\"; }', 'Fatal error: Cannot redeclare exampleFunction() (previously declared in /path/to/your/script.php:3) in /path/to/your/script.php on line 7', '2024-08-24 14:34:34'),
(55, 'php', 'Nabeel ahmed', ' // Example code that triggers a redeclaration error function exampleFunction() { echo \"First declaration.\"; } function exampleFunction() { // This will cause the error echo \"Second declaration.\"; }', 'Fatal error: Cannot redeclare exampleFunction() (previously declared in /path/to/your/script.php:3) in /path/to/your/script.php on line 7', '2024-08-24 14:37:22'),
(56, 'MongoDB', 'Wasam', 'MongoError: E11000 duplicate key error collection: myDatabase.myCollection index: _id_ dup key: {id: ObjectId ( &apos;64edcdc97b37e7a3c5a4b5e1&apos; ) }', 'How can i resolve this error?', '2024-08-24 15:50:04'),
(57, 'php', 'Nabeel ahmed', 'Notice: Undefined variable: undefinedVariable in /path/to/your/script.php on line 3', '// Example code that triggers an undefined variable error echo $undefinedVariable; // This will cause the error', '2024-08-26 11:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `joindate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `joindate`) VALUES
(1, 'hammad', 'hammad44@gmail.com', 'hammad', '2024-08-19 14:54:32'),
(3, 'Wasam', 'wasam88@gmail.com', '$2y$10$PqJXXpCIu.JmM/B0AHxjCeOaOYz3e/009UtE3kzEbc0Z6CpqHUsBC', '2024-08-19 16:30:00'),
(4, 'Nabeel ahmed', 'nabeel098@gmail.com', '$2y$10$RNS5vvalO8zA2.8AMjssG.2TMSiX7uxZui0m18h4d8ZmJoCZtpdPS', '2024-08-20 16:38:39'),
(5, 'Aryan', 'aryan676@gmail.com', '$2y$10$1IGzRcSQFM.T6dIq63WOFON/ijG.ZX8MqQcbo3WamsFY4.uLUVeDi', '2024-08-24 15:50:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);
ALTER TABLE `categories` ADD FULLTEXT KEY `category_name` (`category_name`,`category_description`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);
ALTER TABLE `comments` ADD FULLTEXT KEY `comment_username` (`comment_username`,`comment_content`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_cat` (`thread_cat`,`thread_username`,`thread_topic`,`thread_question`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_cat_2` (`thread_cat`,`thread_username`,`thread_topic`,`thread_question`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_username` (`thread_username`,`thread_topic`,`thread_question`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_cat_3` (`thread_cat`,`thread_username`,`thread_topic`,`thread_question`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
