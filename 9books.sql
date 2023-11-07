-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2023 at 10:01 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `9books`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_details`
--

CREATE TABLE `book_details` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `book_title` varchar(50) NOT NULL,
  `book_price` float(8,2) NOT NULL,
  `book_author` varchar(50) NOT NULL,
  `book_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `book_details`
--

INSERT INTO `book_details` (`id`, `cat_id`, `book_title`, `book_price`, `book_author`, `book_desc`) VALUES
(1, 6, 'you-can-win', 260.00, 'Shiv Khera', 'Success is a hard commodity to obtain. However, like everything in our lives, it only needs careful planning, and deliberation. All success is deliberate, reveals Shiv Khera, and there is nothing magical about winning. Using common sense and varying lessons taken from ancient wisdom to modern philosophy, he shows how we can deal with issues of our daily lives, and how we can turn otherwise bad situations into good ones'),
(2, 6, 'The-secret', 360.50, 'Rhonda Byrne', 'The Secret begins with Byrne introducing the concept of the law of attraction. Byrne maintains that the universe emits a certain frequency which people can attract towards themselves. She stresses that positive thinking is a powerful entity which draws in energy in the same frequency range. In other words, by always engaging in positive thinking, Byrne claims that people will attract back positivity.'),
(3, 6, 'The 7 Habits of Highly Effective People', 360.00, 'Stephen R. Covey', 'In this book, he speaks of seven habits of people who are effective and live a good life because of it. It discusses three stages of character development: dependence, independence and interdependence. This stage marks the progress from dependence to interdependence. This takes place during the growing years of a child till the time they learn how to take care of themselves.'),
(4, 6, 'Life Without Limits', 500.00, 'Nick Vujicic', 'With the help of his personal experiences he has crafted this book, which will certainly motivate people and help them sail through their problems by keeping an optimistic attitude towards life. He asks his readers to believe in the power of faith and the life path God has planned for each one of us.'),
(5, 6, 'Think And Grow Rich', 284.00, 'Napoleon Hill', 'After interviewing over 500 of the most affluent men and women of his time, he uncovered the secret to great wealth based on the notion that if we can learn to think like the rich, we can start to behave like them. By understanding and applying the thirteen simple steps that constitute Hill\'s formula, you can achieve your goals, change your life and join the ranks of the rich and successful.'),
(6, 6, 'Magic of Thinking Big', 340.00, 'David J.Schwartz', 'The Magic Of Thinking Big engaged a wide readership since its release because of the content the self-help book championed and brought to readers. The motivational expert, Schwartz, begins his book with the story of a salesman who by the simple law of expectation managed to sell more even though he had nothing else going for him. He wasnâ€™t smarter nor did he work harder than others, but he simply thought he could sell more.'),
(7, 6, 'Rich Dad Poor Dad', 150.00, 'Robert Kiyosaki', 'In the book Rich Dad Poor Dad: What The Rich Teach Their Kids About Money That the Poor and Middle Class Do Not! Robert Kiyosaki advocates financial independence through owning businesses, investing, and real estate. He also talks about increasing one\'s financial intelligence.'),
(8, 6, 'Drive', 270.00, 'Daniel H. Pink', 'Drive: The Surprising Truth About What Motivates Us starts off by telling the readers that most people have the notion that money and other incentives are the best ways to motivate themselves and others. Employees force themselves to work, as they are lured by the cash bonus or corner office promised by their employers. Pink argues that this mindset is wrong and urges individuals to forget what they know about motivation at home, at school, or at work.'),
(9, 6, 'The Success Principles', 450.00, 'by Jack Canfield', 'The Success Principles by Jack Canfield, cocreator of the phenomenal bestselling Chicken Soup for the Soul series, will teach you how to increase your confidence, tackle daily challenges, live with passion and purpose, and realize all your ambitions. This audio spells out the timeless principles used by successful men and women throughout history. And the fundamentals are the same for all people and all professions -- even if you\'re currently unemployed.'),
(10, 9, 'Benares', 850.00, 'Atul Kochhar', 'At Benares the superior service and setting are the height of luxury, but it is the sublime food that truly sets the restaurant apart. Atul Kochhar\'s unique, world-class cuisine is showcased in this beautiful book of recipes from his Michelin-starred kitchen. 80 signature dishes reflect the excellent food ethos that Atul has created using the best of British produce with his modern Indian style.'),
(11, 9, 'BakeWise', 150.00, 'Shriley', 'No description available'),
(12, 9, 'My Indian Kitchen', 900.00, 'Hari Nayak', 'With the recipes in this book, consistently delicious Indian food at home becomes a reality. From a perfect Mint Chutney with Samosa to a melt-in-the-mouth Chicken Tikka Masala, to Pork Vindaloo, Tandoori Chicken and Sweet Mango Yogurt Lassi, traditional Indian meals without hours and hours of work can be achieved.'),
(13, 9, 'The Cafe Spice Cookbook', 825.00, 'Hari Nayak', '\"The Cafe Spice Cookbook\" provides devotees with the recipes and tips they need to prepare healthy and authentic Indian dishes, using ingredients available at any supermarket or health food store. As a young boy, he watched his grandmother grind fresh spices in the traditional stone mortar, heard the splutter of curry leaves being thrown into hot oil, and knew that making good food was his destiny.'),
(14, 2, 'The Secret Of The Nagas', 150.00, 'Amish Tripathi', 'The hunt is on. The sinister Naga warrior has killed his friend Brahaspati and now stalks his wife Sati. Shiva, the Tibetan immigrant who is the prophesied destroyer of evil, will not rest till he finds his demonic adversary. His vengeance and the path to evil will lead him to the door of the Nagas, the serpent people. Of that he is certain.'),
(15, 2, 'Golden Lion', 140.33, 'Giles Kristian', 'East African Coast, 1670. In a time of brave and brutal adventure, one man will journey across land and sea to pursue his greatest enemy.The Golden Bough, captained by Henry ï¿½Halï¿½ Courtney, is running south from Ethiopia to Zanzibar. Below deck, both his crew and his lover, the fearless warrior Judith Nazet, sleep.'),
(16, 2, 'Are You Afraid Of The Dark', 160.00, 'Sidney Sheldon', 'Four scientists are killed, in different cities across the world, in different ways. The only link between them is that they were all doing research work for a major research company, Kingsley International Group (KIG).'),
(17, 2, 'Death Cure', 200.00, 'James Dashner', 'In this title, the trials are over. But something has happened that no one at WICKED has anticipated: Thomas has recalled more than they think he had. And the truth is more dangerous than anyone could have ever imagined. It is also disclosed that Newt is not immune to the Flare. In this title, the trials are over. But something has happened that no one at WICKED has anticipated:'),
(18, 4, 'Death of a Salesman', 300.50, 'Arthur Miller', 'Willy has not been in a very good state of mind after a recent car accident. His wife thinks that he needs to rest and work from his home town. He goes to his boss and asks him if he can find a job that will allow him to work from town, but he is not successful. This angers Willy and he is fired from his job. His boss has told him that he needs to rest and cannot represent the company.'),
(19, 4, 'The Waterfall', 110.00, 'Rabindranath Tagore', 'The Waterfall (Muktadhara, 1922) is considered by many as one of the finest plays written by Tagore. In his own words it is a \'representation of a concrete psychology\'. Abhijit, one of the principal characters, after a revelation of his castaway status, develops a belief that he has a spiritual relationship with the waterfall beside whose mouth he was discovered.'),
(20, 4, 'Wit', 130.00, 'Edison', 'No description available.'),
(21, 4, 'Streetcar Named Desire', 489.00, 'Williams', 'Fading southern bell Blanche Dubois depends on the kindness of strangers and is adrift in the modern world. When she arrives to stay with her sister Stella in a crowded, boisterous corner of New Orleans, her delusions of grandeur bring her into conflict with Stella\'s crude, brutish husband Stanley.'),
(22, 5, 'Adultery', 220.00, 'Paulo Coelho', 'Linda is in her thirties and is facing a crisis mentally and emotionally. She begins to question the void that was growing in her, the mundane, predictable days of her life. Although her life seemed perfect in everybodyâ€™s eyes â€“ a contented marriage, adorable children and a successful career - she feels a keen sense of emptiness and displeasure.'),
(23, 5, 'half girlfriend', 100.00, 'chetan Baghat', 'Half Girlfriend is an adult romance novel set in the backdrop of Delhi & Bihar primarily. A Bihari boy Madhav falls in love with Riya, daughter of a rich Delhi businessman. They both love to play basketball and become friends. Madhav develops feelings for Riya. However, she is reluctant to commit and wants to stay just as a friend. But, Madhav does not. Riya suggests a compromise and becomes his â€˜half-girlfriendâ€™.'),
(24, 5, 'I Too Had a Love Story', 190.00, 'Ravinder Singh', 'I Too Had A Love Story is a romantic saga of two people belonging to the modern day world of the Internet and gadgets. The story begins as four friends plan a reunion after many years. As their discussion becomes casual and moves to their plans for their partners, Ravin, the protagonist, gets inclined to create an account on a matrimonial website. He comes across a girl named Khushi on this website and starts falling in love with her.'),
(25, 5, 'Fifty Shades Freed', 400.00, 'E L James', 'Anastasia met the business magnate Christian Grey, and through a single meeting, a sensual affair that is bound to shock and titillate the most liberal of minds ensued. The ghosts of Greyâ€™s past constantly tested the affair and although Ana knew the complexity of her â€˜fifty shadesâ€™ there is no easy way to tackle a fascinating man with repulsive tastes.'),
(26, 1, 'Harry Potter', 600.00, ' J K Rowling', 'Based on an original new story by J. K. Rowling, Jack Thorne and John Tiffany, Harry Potter and the Cursed Child, a new play by Jack Thorne, is the first official Harry Potter story to be presented on stage. It will receive its world premiere in London\'s West End on 30th July 2016.\r\n\r\nIt was always difficult being Harry Potter and it isn\'t much easier now that he is an overworked employee of the Ministry of Magic, a husband and father of three school-age children.\r\n\r\nWhile Harry grapples with a past that refuses to stay where it belongs, his youngest son Albus must struggle with the weight of a family legacy he never wanted. As past and present fuse ominously, both father and son learn the uncomfortable truth: sometimes darkness comes from unexpected places.'),
(27, 1, 'She Swiped Right into My Heart', 200.00, 'Sudeep Nagarkar', '\"If you\'ve never had friends, you\'ve never really lived Geet, one of the most unpopular girls in college, is best friends with the beautiful and soughtafter Shibani. To win the popularity vote, Geet takes the help of college hottie Rudra, who agrees to act as her \'boyfriend\' - he sees an opportunity to get closer to Shibani. Little does he know that Shibani has been harbouring feelings for someone else all along. As misunderstandings and jealousies take centre stage, Geet must make a decision that will affect not just her own life, but also those of her loved ones. She Swiped Right into My Heart is a story about love - gained and lost - and the healing power of friendship.\"'),
(28, 1, 'American Will', 700.00, 'Bobby Jindal', '\'Nearly forty - five years ago, Bobby Jindal\'s parents left their home in rural India a place with no electricity or running water to build a new life in the United States. Every day, Jindal\'s father told him, \'You should be grateful that you were blessed to be born in the greatest country in the history of the world a country where the son of poor immigrants could grow up to become the governor of Louisiana. For Jindal, this defining experience bolsters a profound belief in American exceptionalism - Freedom is not just the American way, it\'s the American will.\r\n\r\nAs we approach the next great turning point in this extraordinary nation&#65533;s remarkable history, Jindal brings to life inspiring stories from our country\'s past that have influenced his beliefs and the indispensable lessons each can teach us about our future. Stories such as the stalwart senator who galvanized the public against Hillary Clinton\'s costly and oppressive socialist health care proposal in the early 1990s, the entrepreneur whose dogged determination ushered in a worldwide energy revolution, and with it technological innovation and economic growt, and the Founding Father who refused to \'lead from behind\' and instead used his vision for the nascent nation\'s vast potential and the best interests of its people to outwit a greedy dictator.\r\n\r\nIn American Will, Governor Bobby Jindal brings to life some of history\'s greatest lessons by making readers feel like they were right there at the turning points that defined our republic. Many of its topics are expected to be at the center of the next presidential election - elective wars overseas, the size of government, church and state, school choice, immigration, American exceptionalism, the nature of our enemies, the power of television, and consequences of a divided Republican Party.\'\r\n'),
(29, 1, 'The Rise and Fall of Nations', 799.00, 'Ruchir Sharma', 'Shaped by his 25 years travelling the world, and enlivened by his encounters with presidents, tycoons and villagers from Rio to Beijing, Ruchir Sharma\'s new book rethinks the dismal science of economics as a practical art, based not just on crunching numbers but on live observation. He shows us how to read the political headlines, the world billionaire rankings, the price of onions and popular news magazine covers as signs of coming booms, busts and protests. Parsing the complicated flood of data on debt, trade and capital flows, Sharma explains exactly which numbers are most telling for a nation\'s fortunes, and when they signal a turn for the better or worse.\r\n\r\nIn our post-crisis age that has turned the world on its head, and ended a decade of supercharged growth, replacing political calm with revolt and hype for globalization with fear of deglobalization, Sharma\'s pioneering book \'erves as a highly readable field guide to understanding change not only in this new era, but in any era. It is written for any practical person - newspaper reader, business executive, politician or investor - interested in a new economics focused on what is coming next, not on the past. There is a saying that to know the road ahead, ask those coming back. On this road, Sharma is the one who has been there ahead of us. '),
(30, 7, 'Let Us C', 265.00, 'Yashavant Kanetkar', 'With the expanding horizon of digital technology, there is also an increasing need for software professionals with a good command of a variety of programming languages. The C language is one of the basic skill sets in a programmer’s portfolio.\r\n\r\nThere has been an explosion in the number of programming languages and different development platforms. However, the C programming language has retained its popularity across the decades.\r\n\r\nLet Us C is a great resource from which one can learn C programming. It does not assume any previous knowledge of C or even the basics of programming. It covers everything from basic programming concepts and fundamental C programming constructs.\r\n\r\nThe book explains basic concepts like data types and control structures, decision control structure and loops, creating functions and using the standard C library. It also covers C preprocessor directives, handling strings, and error handling.\r\n\r\nIt also discusses C programming under different environments like Windows and Linux. The book uses a lot of programming examples to help the reader gain a deeper understanding of the various C features.\r\n\r\nThis book also aims to help prepare readers not just for the theoretical exams, but also the practical ones. It builds their C programming skills. It also helps in getting through job interviews. There is a separate section in the book that discusses the most Frequently Asked Questions in job interviews.\r\n\r\nThis is the 13th edition of the book and it covers all levels of C programming, from basic to intermediate and advanced levels of expertise. With clear concept coverage, simple instructions and many illustrative examples, Let Us C teaches programming and C language features effectively and easily.'),
(31, 7, 'INTRODUCTION TO ALGORITHMS', 766.00, 'Al. Cormen', 'The contemporary study of all computer algorithms can be understood clearly by perusing the contents of Introduction To Algorithms. Although this covers most of the important aspects of algorithms, the concepts have been detailed in a lucid manner, so as to be palatable to readers at all levels of skill.\r\n\r\nIntroduction To Algorithms has a number of chapters, each of which is self-contained, as it contains an algorithm, followed by a design technique. There is also an area of application or a related topic, so that students can find out the practical implications of the algorithm in question.\r\n\r\nThere is an introduction unit, where the foundations of algorithms are covered. At all points in the book, the jargon and technical information are presented so as to be readable by anyone who has dabbled to some extent in programming. The foundation unit seeks to enlighten the reader regarding the role algorithms play in modern computer programming and the growth of functions, among other things.\r\n\r\nIntroduction To Algorithms then moves on to Sorting and Order Statistics, introducing the concepts of Heapsort and Quicksort, and also explaining how to sort in real time. A number of other topics such as Design and Analysis and Graph Algorithms are covered in the book. One feature to note in this book is that two new chapters have been added in this third edition, one on multithreaded algorithms and another on Van Emde Boas trees.\r\n\r\nIntroduction To Algorithms is a popular book that has sold more than twenty million copies in total. In fact, it is so famous that it is commonly referred to as ‘CLRS’, after the initials of the authors. The book includes new problems and exercises in this edition.'),
(32, 7, 'Head First PHP & MySQL', 925.00, 'Lynn Beighley', 'Michael Morrison, Lynn Beighley’s HEAD FIRST PHP & MYSQL 1st Edition is apt for people who have a keen interest in learning programming languages. The book covers PHP and MYSQL concepts.'),
(33, 7, 'Java', 779.00, 'Herbert Schildt', 'Java - The Complete Reference is a comprehensive book for undergraduate students of Computer Science Engineering. The book comprises of chapters on the Java language, the Java library, GUI programming with Swing, GUI programming with JavaFX and applying Java. In addition, the book provides access to an online source which has all the examples and projects in the book available for download. This book is essential for computer science engineers preparing for various competitive examinations like GATE.'),
(34, 8, 'Steve Jobs: The Exclusive Biography', 400.00, 'Walter Isaacson', 'This book depicts the life and times of the pioneer, the perfectionist, and the devil that Steve Jobs was. To chronicle his life, Isaacson had to interview several of his competitors, colleagues, friends and family. Jobs himself contributed to this biography by engaging in more than 40 interviews with Isaacson. At a time when the digital world was craving a massive revolution, Apple resorted to a completely different model of creative perfection that proved that the sky is not the limit for the possibilities of engineering marvels. Jobs was a college dropout who had a great time in the counterculture, only to leave all of it to begin Apple Computers with his friend Steve Wozniak in a garage. The rest has been the history that the world has been witnessing ever since.\r\n\r\nThis biography was released on Oct. 24, 2011 and became a New York Times bestseller. The book was listed among the Best Books of the Year by Time magazine and won the Goldman Sachs Business Book of the Year Award. The book has been adapted into a film starring Ashton Kutcher in the lead as Steve Jobs.'),
(35, 10, 'Stock Operator', 1020.00, 'John Wiley', 'The Reminiscences of a Stock Operator is a fictional biography of Jesse Livermore, one of the most acclaimed speculators. The tale will enrich the lives of investors and those who want to invest. It also helps in the making of better portfolios. The book is found to have taught generations of investors about themselves and other investors rather than the years of experience one might have in the field.');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_title` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_title`) VALUES
(7, 'biography'),
(9, 'bussiness'),
(8, 'cooking'),
(2, 'crime_fiction'),
(3, 'drama_fiction'),
(1, 'preorder'),
(6, 'programming'),
(4, 'romance_fiction'),
(5, 'selfhelp'),
(10, 'teens');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_items`
--

CREATE TABLE `ordered_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `sel_item_id` int(11) DEFAULT NULL,
  `sel_item_qty` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_book_id` int(10) NOT NULL,
  `review_date` date NOT NULL,
  `reviewer_name` varchar(20) NOT NULL,
  `review_title` varchar(20) NOT NULL,
  `review_com` text NOT NULL,
  `review_rating` smallint(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_book_id`, `review_date`, `reviewer_name`, `review_title`, `review_com`, `review_rating`) VALUES
(1, '2016-04-30', 'sriram', 'good', 'ksdjlk ', 3),
(11, '2016-04-30', 'sriram', 'delicious', 'klsjdlkjLAoeo mlje', 5);

-- --------------------------------------------------------

--
-- Table structure for table `shopper_track`
--

CREATE TABLE `shopper_track` (
  `id` int(10) NOT NULL,
  `session_id` varchar(30) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_qty` smallint(6) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `store_orders`
--

CREATE TABLE `store_orders` (
  `id` int(11) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `order_name` varchar(100) DEFAULT NULL,
  `order_address` varchar(250) DEFAULT NULL,
  `order_city` varchar(50) DEFAULT NULL,
  `order_state` varchar(20) DEFAULT NULL,
  `order_zip` varchar(20) DEFAULT NULL,
  `order_mob` varchar(20) DEFAULT NULL,
  `order_email` varchar(100) DEFAULT NULL,
  `item_total` float(6,2) DEFAULT NULL,
  `shipping_total` float(6,2) DEFAULT NULL,
  `authorization` varchar(50) DEFAULT NULL,
  `status` enum('processed','pending') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Name`, `email`, `password`) VALUES
(3, 'bharagvi', 'bharagvi@gmail.com', '44b94cbce80870c7e2f933b355457429');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_details`
--
ALTER TABLE `book_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cat_title` (`cat_title`);

--
-- Indexes for table `ordered_items`
--
ALTER TABLE `ordered_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopper_track`
--
ALTER TABLE `shopper_track`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_orders`
--
ALTER TABLE `store_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_details`
--
ALTER TABLE `book_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ordered_items`
--
ALTER TABLE `ordered_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shopper_track`
--
ALTER TABLE `shopper_track`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `store_orders`
--
ALTER TABLE `store_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
