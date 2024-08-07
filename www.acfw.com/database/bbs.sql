-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2024 at 11:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `idx` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `hit` int(11) NOT NULL DEFAULT 0,
  `lock_post` int(11) NOT NULL DEFAULT 0,
  `boardcol` varchar(45) DEFAULT NULL,
  `thumbup` int(11) NOT NULL DEFAULT 0,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`idx`, `name`, `pw`, `title`, `content`, `date`, `hit`, `lock_post`, `boardcol`, `thumbup`, `file`) VALUES
(1, 'test', '1111', 'testtitle', 'testcontent', '2020-12-01', 43, 0, '0', 0, ''),
(2, 'temp', '$2y$10$3qwQBciThgUtDeDYdt2TSem3Bw0AhHbkjFhSCm.RFJb1ckcwyD9/G', 'temp', 'asdkl;fjas;lkdfjaslkdfjsaldfk', '2024-07-09', 5, 0, NULL, 0, ''),
(3, 'asdasdasd', '$2y$10$koD.edNOBksl.pzWQ30E6OPFozDztWlsjkokuUWxRGo5gre3igLX6', 'asdfasdfasdf', 'asdasdasdasdasdasdfsadfsdfsadf', '2024-07-09', 5, 0, NULL, 0, ''),
(4, '123123', '$2y$10$HoDGfHXelcy/OF4PQ8nmRu1pM1Ej6ecoq86c/xGvB7HC17urnWA2q', '123123', '123123123123123', '2024-07-09', 0, 1, NULL, 0, ''),
(5, 'lsdkfjaslkfjaslkdfj', '$2y$10$gDF8fcTDFdTKtRkIBmC3UOv16SJpvFowEw4qT9kymjMLh0acbyorK', 'asdfljasdlfkjasldfk', 'sldkfjlskdfjlskdfjlsd', '2024-07-09', 1, 1, NULL, 0, ''),
(6, 'zxczxc', '$2y$10$PT92SH07JCGu5SkaDR9Y.uZMzKvXrgcLlcrJwaoAWYVpo2AoZ1PFu', 'zxczxc', 'zxczxc', '2024-07-09', 0, 1, NULL, 0, ''),
(7, 'afasdfawseg', '$2y$10$.4xZtvJZcN7BieeBc3sOkuuLdCfzLg7SCOAZ0dZmgycWJKF.MTDpi', 'aetawte', 'asdgasdfasdf', '2024-07-10', 2, 0, NULL, 0, '180501_board.zip'),
(8, 'aefg a35w4hsexd', '$2y$10$.Y7P10vSPTokR.qyPksf9OZMe5Pd.jRF9pvqZNkRUn.5g7wQRyElq', 'fbg eys5h', 'actgq3va  y4bves gxvb ', '2024-07-10', 1, 0, NULL, 0, '180501_board.zip'),
(9, 'drgwaergergerg', '$2y$10$mHCebJTQBBRYQdPTOxMCEed.JYUEucaRoTW8/6yqt9a7p8hSukBUi', 'dfgdxfbdfbdsfgb', 'vesthsrfxnxergthbrnf', '2024-07-10', 26, 0, NULL, 0, ''),
(10, 'asdasd', '$2y$10$Hm9l1sHkclMBB7hTkPfjUuypAopxdnJyvsEi4MXnTVe2PLxr8Yzoi', 'asdasd', 'asdasdasd', '2024-07-23', 0, 0, NULL, 0, ''),
(11, 'sdfsdfsdfs', '$2y$10$VgzxFQHxy8VxssGb33AIFubMkxeAwskB.o7ZvJJEKuh2Vsk7mrbN.', 'sdfssdfsdf', 'asdfagensytruyitmfdtrsq35w45ejdyrsatWG3W457EJKUDTJYRSTEHA3W4UJ', '2024-07-23', 1, 0, NULL, 0, ''),
(12, 'name', '$2y$10$IaL9JJPMHiKfG60zAOW6Ke8inlXc9TJILW.ENfHUiBqAZ9TPnCoSW', 'new post', 'test', '2024-07-23', 0, 0, NULL, 0, ''),
(13, 'bbb', '$2y$10$O9gb3OnYuD1S3zd6cXe4e.2IHi0tdVGNOeXkhyOPvveXrRajq1G8e', 'aaa', 'ccc', '2024-07-23', 1, 0, NULL, 0, 'Screenshot 2024-07-19 111316.png'),
(14, 'asdfasdf', '$2y$10$QqPQt0s9lSfxotMQptME7eCv3gCAJ6M.Zv7xLZoGhqVm44axMO./W', 'asdfasdf', 'asdfasdf', '2024-07-23', 0, 0, NULL, 0, 'Screenshot 2024-07-19 110402.png'),
(15, 'dlkfjae;ldfkjas;klsdjflk', '$2y$10$9thVbNyYKESd/ldWl4V74uqBFgw3OVLCZ3wNnlOx/ZwTuibYkeLja', 'sdfkldjslkfjsdlkfjsdlkfj', 'elfjsldfjasdlkfjasldfjaldsfjalsdfjalsdkfj', '2024-07-23', 0, 0, NULL, 0, 'Screenshot 2024-07-12 190623.png'),
(16, 'rhsgeatesrnegthfnegaebsdgxd', '$2y$10$44agftmp8rZ2Pa5bd2JyK.APQLeTpO9o.jsKl3QqeYoef.72CwplW', 'dfsgfdghsaghsdfndsgsffx', 'sdxgbddfnxdawgrzbdgnxf nbgnxf', '2024-07-23', 0, 0, NULL, 0, 'Screenshot 2024-01-09 120532.png'),
(17, 'safsadf', '$2y$10$R/wws4u/DYNR1c610lQ76OGtuErAvTtT.iIovbkYQZIFSzrfeyNtm', 'dfsadfasdf', 'sadfasdfasdfasdf', '2024-07-26', 0, 0, NULL, 0, ''),
(18, 'sadb', '$2y$10$AzOSMWOBp0Gheu2CeACAVu0LuUaIscA2Xl39U1BMbyJPhXD1YFGRS', 'Hi', 'HAHA who am i kidding. ', '2024-07-26', 3, 0, NULL, 0, ''),
(19, 'asdasd', '$2y$10$vpZz8PoAyUX8lzIVDQDrLOoaocJ0auYbK14SGcP6oSW23s/SiHiW2', 'asdasd', 'dsaadsfasdf', '2024-07-27', 0, 0, NULL, 0, ''),
(20, 'stupid.', '$2y$10$UwoZmIE0EDcvQsf8knp3MO4KxwS3mjzFnct8PosMu9jI3Loe08gjy', 'i\'m stupid.', 'Hi L ! I miss you so much. Guys! Pls. Don\'t do what i did, i met the perfect girl but instead of moving forward, i just went back to seeing my ex. Yeah i know i\'m stupid. Everything was on point when we where together. Idk why, i guess i was scared or something. I didn\'t know if we would last. I hope we could still be friends( it\'s been more than a year after all ). Maybe one day you\'ll forgive me and take me back. HAHA who am i kidding. Baka may chance pa.', '2024-07-27', 0, 0, NULL, 0, 'PXL_20240424_191237281.PORTRAIT.jpg'),
(21, 'March 16, 2019 3:56:22 AM GMT', '$2y$10$M2is/y39axfmOe3anuomgu9FIUMZcKATYJzqTOyzQv/ZDakawRHtK', 'ranking', 'Does anyone remember how to know your batch ranking? yung may url/idnumber\r\nSubmitted:  March 16, 2019 3:56:22 AM GMT', '2024-07-27', 0, 0, NULL, 0, 'PXL_20240425_204725528.PORTRAIT.ORIGINAL.jpg'),
(22, ':)', '$2y$10$k7QUNzjR0WeqQFw00szSG.bmScVmwAtzhScyGviSL7dk3I6bYetEy', 'My cheater boyfriend got me pregnant', 'My boyfriend cheated on me while i was pregnant. For 10 months he had been flirting with four girls and one he had sex with. He started cheating when we started dating. I had no idea bcoz he was sweet to me. He was so good at lying. I fell for it bcoz after being abused for so long, i thought maybe, finally, this was what i was waiting for. Before him i had a past. I had an ex who cheated. Another raped me and another physically and verbally abused me. But with my current boyfriend, it felt perfect. I love him so much. It changed when we found out i was pregnant. We were constantly fighting. I broke up with him hoping he would realize that i wasnt okay anymore and he would man up. But he didnt, he left me. He left me when i needed him the most and forced me to get an abortion. He said if i told his family he would kill himself. I couldnt risk it bcoz i love him so much. For awhile i was so stupid that i actually did try to abort because he promised that if the baby was gone maybe we could try to be together again. I wanted that. I wanted us. So i tried. But nothing worked. Eventually i stopped listening to him bcoz i got tired. He was never coming back. If he did love me, he would be there for me, pregnant or not. So i went to his parents secretly. I had to tell our parents, i was having a hard time already. Long story short, we got back together because he said he loves me and i thought things would be okay because we were in this together. Things werent okay tho. It was when i found out he was flirting with several girls. I love him so much so i forgave him. I trusted him still. He would stay late at school because of projects he said. Things seemed to be going well after that. I was wrong. A few weeks after our son was born i found out the cheating was much worse. He had sex with someone. Took his highschool crush on a date and flirted with several other girls. Was even still in contact with the girl he had sex with up until the day our son was born. You can imagine how much this broke me. Still, i forgave him because i love him. Also on the condition that i would have all his social media accounts. We would still often fight after that because i found his old messages abt how he lied to his friends to make me look crazy. How his bestfriend encouraged him to cheat. I was hurt. Again and again, i forgave him. I kept thinking, that i love him and our baby needs his dad. Every time i was anxious or jealous, he would get mad. He said that i didnt have to feel that way because our son is there now and things are different. He never listened to what i felt, to what the problem was. Like im not allowed to feel negative things. I admit im wrong when i easily get mad bcoz im jealous or there are things that make me anxious or insecure. But i cant help what i feel. I just needed my boyfriend to listen. I dont need him to explain. I just want him to listen. But he doesnt. Then we had a big fight. He broke up with me and changed all his social media passwords. He said he needs space. That \"nasasakal na siya.\" I begged him not to break up with me. That i dont need his social media but i just want to be able to open his phone bcoz its only been a few months and the memory of him cheating was still fresh. We\'re still together now. But he doesnt want to spend time with me in school anymore cuz he says we spend enough time at home since we live together. Fine, okay have your space. I dont react anymore if he talks to other girls bcoz i know its for school and they\'re friends. I just got anxious when he added girls that he doesnt even know? No mutual friends or anything? What for? He knew how i was going to react, what i was going to feel. Yet he doesnt care. He keeps saying nasasakal na siya. I can stand and try to be calm when he adds other girls just as long as he actually knows them. Have mutual friends or know them from school. But he promised before, that he wasnt going to add girls he doesnt know anymore. So why is he doing this? Does he even still love me? Is this even worth the risk of getting hurt again? Bcoz my son is all thats keeping me together. I love my boyfriend but it hurts so much. I feel like im drowning over and over again. I feel like he\'s going to be the reason i die. ', '2024-07-27', 0, 0, NULL, 0, 'PXL_20240424_191237281.PORTRAIT.jpg'),
(23, 'dlffkjdlksafjslskdfjas', '$2y$10$MBZBRWqQI8T5Scmu3ZQQa.S6fxfVvM1pdEznaIVrjPGRywfxhruTS', 'sdljfkjsaldkfjalskdfj', 'Global web icon\r\njQuery UI\r\nhttps://jqueryui.com/resiz\r\nResizable - jQuery UI\r\nLearn how to use the resizable interaction to enable any DOM element to be resizable with the mouse. See examples, API documentation, and jQuery UI features.\r\n\r\nAPI Documentation\r\nThe jQuery UI Resizable plugin makes selected elements resizable (meaning …\r\n\r\nDefault Functionality\r\nLearn how to make any element resizable with jQuery UI. Drag the border of the …\r\n\r\nTextarea\r\nLearn how to resize a textarea element with jQuery UI, a powerful library for creating …\r\n\r\nHelper\r\nHelper - Resizable - jQuery UI\r\n\r\nAnimate\r\njQuery UI Resizable - Animate Animate\r\n\r\nMaximum / Minimum Size\r\nMaximum / Minimum Size - Resizable - jQuery UI\r\n\r\nSnap to Grid\r\nSnap to Grid - Resizable - jQuery UI\r\n\r\nPreserve Aspect Ratio\r\nPreserve Aspect Ratio - Resizable - jQuery UI\r\n\r\nOther content from jqueryui.com\r\nDemos - Resizable | Jquery UI\r\nMenu - Resizable | Jquery UI\r\nMaximum / Minimum Size - Resizable | Jquery UI\r\nSee more\r\n \r\nGlobal web icon\r\njQuery UI\r\nhttps://api.jqueryui.com/resizable\r\nResizable Widget | jQuery UI API Documentation\r\nThe jQuery UI Resizable plugin makes selected elements resizable (meaning they have draggable resize handles). You can specify one or more handles as well as min and max width and height.\r\n\r\nGlobal web icon\r\nStack Overflow\r\nhttps://stackoverflow.com/questions/3628194\r\nHow to resize ONLY horizontally or vertically with jQuery …\r\nSep 2, 2010 · The only solution I\'ve found is to set the max and min height or width with the current value. Example: foo.resizable({. maxHeight: foo.height(), minHeight: foo.height() }); But …\r\n\r\nCode sample\r\nfoo.resizable({\r\n  handles: \'e, w\'\r\n});?\r\nSee more on stackoverflowFeedback\r\ncss - jQuery UI resizable\r\nNov 20, 2016\r\njQuery UI Resizable: set size programmatically?\r\nSep 4, 2013\r\nSee more results\r\nQuestion & Answer\r\n\r\nStack Overflow\r\nQuestion\r\njQuery UI resizable - limit to parent width, and leave height to auto.\r\nI do need to use jQuery UI resizable with parent limits only t…\r\nAnswer · 4 votes\r\nThe following code snippet allows resizing t…\r\nMore\r\n\r\nStack Overflow\r\nQuestion\r\nHow to resize ONLY horizontally or vertically with jQuery UI Resizable?\r\nThe only solution I\'ve found is to s…\r\nAnswer · 147 votes\r\nYou could set the resize handles option to only sh…\r\nMore\r\n\r\nStack Overflow\r\nQuestion\r\njQuery UI Resizable: set size programmatically?\r\nFor example, user inputs width and height values to tell the widget to resize t…\r\nAnswer · 1 votes\r\nvar w = prompt(\'width?\')*1; var h = prompt(\'height?\')*…\r\nMore\r\n\r\nStack Overflow\r\nQuestion\r\njQuery-UI resizable, programatically resizing.\r\nI am trying to resize a div with jquery and have the alsoResize trigger: I trie…\r\nAnswer · 2 votes\r\nThis issue is an interesting one. My nee…\r\nMore\r\nAlgonquin College\r\n\r\nSee if your school has results for jquery ui resizable\r\nGlobal web icon\r\njQuery UI\r\nhttps://api.jqueryui.com/1.8/resizable\r\nResizable Widget | jQuery UI 1.8 Documentation\r\nLearn how to use the jQuery UI Resizable plugin to change the size of an element using the mouse. See options, methods, events and examples for this widget.\r\n\r\nGlobal web icon\r\nGeeksForGeeks\r\nhttps://www.geeksforgeeks.org/jquery-ui-…\r\njQuery UI | Resizable - GeeksforGeeks\r\nExplore this image\r\nDec 6, 2022 · The resizable widget of jQuery UI helps to drag and resize the selected elements. Let’s write a code to use the Resizable widget inside a div …\r\n\r\nEstimated Reading Time: 4 mins\r\nGlobal web icon\r\njQuery UI\r\nhttps://jqueryui.com/resources/demos/resizable/default.html\r\njQuery UI Resizable - Default functionality\r\nLearn how to make any element resizable with jQuery UI. Drag the border of the element to adjust its size. See the demo and the API.\r\n\r\nPeople also ask\r\nAsk Copilot\r\nWhat is UI resizable?\r\nui-resizable: The resizable element. During a resize, the ui-resizable-resizing class is added. When the autoHide option is set, the ui-resizable-autohide class is added. ui-resizable-handle: One of the handles of the resizable, specified using the handles option.\r\nResizable Widget | jQuery UI API Documentation\r\n\r\napi.jqueryui.com\r\nAsk Copilot\r\nWhat is resizable in jQuery UI?\r\nDescription: Change the size of an element using the mouse. The jQuery UI Resizable plugin makes selected elements resizable (meaning they have draggable resize handles). You can specify one or more handles as well as min and max width and height. The resizable widget uses the jQuery UI CSS framework to style its look and feel.\r\nResizable Widget | jQuery UI API Documentation\r\n\r\napi.jqueryui.com\r\nAsk Copilot\r\nHow to use resizable widget in jQuery UI?\r\nThe resizable widget of jQuery UI helps to drag and resize the selected elements. Let’s write a code to use the Resizable widget inside a div tag. Syntax: 1. alsoResize: This option allows you to parallelly resize more than one widget by controlling only one widget. Syntax:\r\njQuery UI | Resizable - GeeksforGeeks\r\n\r\ngeeksforgeeks.org\r\nAsk Copilot\r\nIs it possible to resize a jQuery element in a regular way?\r\nAs i see it\'s not possible through regular way, and we have to do something else through jQuery. I\'ve already tried through event resize, to get current height of resizing element and compare is it close to a parent height, if it\'s close, i would increase height of parent and i\'m okay.\r\ncss - jQuery UI resizable - limit to parent width, and leave height to\r\n\r\nstackoverflow.com\r\nFeedback\r\nGlobal web icon\r\njQuery UI\r\nhttps://jqueryui.com/resources/demos/resizable/animate.html\r\njQuery UI Resizable - Animate\r\njQuery UI Resizable - Animate Animate\r\n\r\nGlobal web icon\r\nGeeksForGeeks\r\nhttps://www.geeksforgeeks.org/jquery-ui-resizable-resize-events\r\njQuery UI Resizable resize Events - GeeksforGeeks\r\nFeb 7, 2022 · resize: function( event, ui ) {. ui.size.height = Math.round( ui.size.height / 27 ) * 27; } }); Parameters: It accepts a callback function that has two parameters. event: It accepts event …\r\n\r\nGlobal web icon\r\nstackoverflow.com\r\nhttps://stackoverflow.com/questions/47756318\r\njQuery UI resizable minimal example - Stack Overflow\r\nDec 11, 2017 · Minimal example taken from https://jqueryui.com/resizable/. https://jsfiddle.net/e0sdfuLb/. Your fiddle is not working because you haven\'t imported also the …\r\n\r\nGlobal web icon\r\ndevexpress.com\r\nhttps://js.devexpress.com/jQuery/Documentation/Guide/UI_Components/...\r\njQuery Resizable - Overview - DevExtreme jQuery Documentation\r\njQuery Resizable - Overview. The Resizable UI component enables its content to be resizable in the UI. View Demo. The following code adds a resizable image to your page. Note that the …\r\n\r\njquery on div resize\r\njquery dialog resize\r\njquery on resize\r\nMore\r\nRelated searches for jquery ui resizable\r\njquery on div resize\r\njquery dialog resize\r\njquery on resize\r\njquery ui resizable handles\r\njquery resizable splitting\r\njquery resize event\r\nresizable js\r\njavascript resizable\r\nSome results have been removed\r\n1\r\n2\r\n3\r\n4\r\n\r\n\r\n', '2024-07-28', 1, 0, NULL, 0, ''),
(24, 'Sent by Copilot:', '$2y$10$SGXRDpUkhMmlpUqV5fadAOvz0twxxY5Lo3mjdHweptI7P/4Ty5gY6', 'Response stopped', 'jQuery UI’s resizable method allows you to make any DOM element resizable, with various options to customize the resizing behavior. You can specify which handles to use for resizing, constrain the resize area, and trigger events during the resize process. Would you like to know how to implement it or have any specific questions about its features?', '2024-07-28', 0, 0, NULL, 0, ''),
(25, 'asdasdasd', '$2y$10$VuWDmrLf/cLiJFWDsl5UGOqhhr4s5gcCj0GxmtMUFH2bNuq8BC8Yq', 'asdasdasd', 'asdasdasd', '2024-07-28', 0, 0, NULL, 0, ''),
(26, 'asd', '$2y$10$0vnwgmWg0pt0Hx21dFyYl.pDD9gFMjB.VjD4LOBDw/HL6.VKhCDQq', 'asd', 'asd', '2024-07-28', 0, 0, NULL, 0, 'Picture1.png'),
(27, 'asdasd', '$2y$10$snnxgvLyV2ZrV7WYK7p9NO.wna/0.fHPPhXeUeKCBHItl1hE8bgpO', 'asdasd', 'asdasd', '2024-07-28', 0, 0, NULL, 0, ''),
(28, 'asd', '$2y$10$A91eyzZMNfEfbJCkluPPru3pEIUKQF6gj3NxNhtNmmlaHJZ9QfNNu', 'asd', 'asd', '2024-07-28', 0, 0, NULL, 0, 'Picture1 - Copy.png'),
(29, 'sdfsdf', '$2y$10$Bka5OOoNAK0pib2xMfs1veZdVXTYB9eggnQwRZjudTkrfBSc9JmMS', 'sdfsdf', 'sdfsdf', '2024-07-28', 0, 0, NULL, 0, 'IMG_20200814_200746.jpg'),
(30, 'adssfdfsdsd', '$2y$10$Obayp0iIdyKeyXLQ4LKyluE8TdSfqwRnnk2dujazbIuixKxejioDa', 'ssaddfafgfsadgf', 'sadfsadf', '2024-07-28', 0, 0, NULL, 0, ''),
(31, 'sadfsadf', '$2y$10$FX5baoN0KiW9OhuCpUAd1erPhh0M9UTckGlQTxzntJcp1Pb2lB9E6', 'asdfasdf', 'sadfsadf', '2024-07-28', 0, 0, NULL, 0, ''),
(32, 'aaa', '$2y$10$B5bQCcJfCDnW8Tw43pc.nOpeoPO7ADncXjLNS9e7Hu88B52.HppJS', 'aaa', 'aaa', '2024-07-28', 0, 0, NULL, 0, ''),
(33, 'asdasd', '$2y$10$UnJEl/qNWTXJ0zLkg9lrFOuyTJRvh/3/og9ZMC5peqsAj/GJD8IqK', 'asdasd', 'asdasd', '2024-07-28', 0, 0, NULL, 0, 'PXL_20240424_191237281.PORTRAIT.jpg'),
(34, 'aaafdfgfgdfgdfg', '$2y$10$Go84ApRqjPxLbAy0CK3AmeEKxXCtu97.xG4wGityOvWHi5RR2ZBOO', 'aaadfgdsfgagdsgdgfdg', 'shrdtdyfguigouiyfukjshggraethrsdtjuhfgdfsh', '2024-07-31', 0, 0, NULL, 0, ''),
(35, 'aaagfdgdfgfdgdfb', '$2y$10$/qnIkpCY5AJGmxBopHnkue6421EJHUTNJHxdqeLLBo41WO86BITEm', 'aaaasffsdfsgdfdgdfg', 'aaa3hryhjmfit7r65e46ehstj5riwu46syrj', '2024-07-31', 0, 0, NULL, 0, 'Screenshot 2024-07-30 232554.png'),
(36, 'aaa33w46e6whw4srhq3w46ejy5rst', '$2y$10$NyLTFANjnWqsYFKyy7G0YuNc0IgNFsW.J8TDAruvYO7Q47NvZ15Yq', 'aaaghsdfhgw4eh5ydr45we65jydre3wy4eh6', 'Boolean Field in Oracle\r\nAsked 15 years, 11 months ago\r\nModified 5 months ago\r\nViewed 222k times\r\n154\r\n\r\nYesterday I wanted to add a boolean field to an Oracle table. However, there isn\'t actually a boolean data type in Oracle. Does anyone here know the best way to simulate a boolean? Googling the subject discovered several approaches\r\n\r\nUse an integer and just don\'t bother assigning anything other than 0 or 1 to it.\r\n\r\nUse a char field with \'Y\' or \'N\' as the only two values.\r\n\r\nUse an enum with the CHECK constraint.\r\n\r\nDo experienced Oracle developers know which approach is preferred/canonical?\r\n\r\noraclebooleansqldatatypes\r\nShare\r\nImprove this question\r\nFollow\r\nedited Dec 18, 2015 at 6:30\r\nLalit Kumar B\'s user avatar\r\nLalit Kumar B\r\n48.6k1313 gold badges101101 silver badges127127 bronze badges\r\nasked Aug 27, 2008 at 13:16\r\nEli Courtwright\'s user avatar\r\nEli Courtwright\r\n191k6767 gold badges217217 silver badges256256 bronze badges\r\n209\r\nI wish Oracle had a wall data type so I could smash my head against it when using booleans. – \r\nGreg\r\n CommentedMar 29, 2010 at 20:28 ', '2024-07-31', 0, 0, NULL, 0, ''),
(37, 'asdfasdfasdf', '$2y$10$i7RTtccqd4iAAo3oLYdmoOekYCSe48NopZ0e8l2L0J1lCadt/csGm', 'asdfasdfas', 'asdfasdfasdf', '2024-07-31', 0, 0, NULL, 0, ''),
(38, 'asdfasdfasdf', '$2y$10$Wg73Ihpi9dMqPfLRpPgLP.jB2yh774/Bl/PY34g72yvjznIRRoZna', 'asfdasfdasdf', 'asdfasdfasdf', '2024-07-31', 0, 0, NULL, 0, ''),
(39, 'asdfasdfasdf', '$2y$10$XYodOIbrhbs4hhlMvSAoeeaRQ1MG1VeyDBzlvfNqu7MoUsc9Tv.Ge', 'asdfasdfasdf', 'asdfasdfasdf', '2024-07-31', 0, 0, NULL, 0, ''),
(40, 'asdfasdf', '$2y$10$fraHuiyD.uvnRBjW6bIGH.0XU2UzTDFWjKntGzq9PbZgesR9lg9sG', 'asdfasdf', 'asdfsadfasdf', '2024-07-31', 0, 0, NULL, 0, ''),
(41, 'asdfasdf', '$2y$10$EucFkZMaFeHLR8MFL4hAzesMQMIB4vO0jWwgyjBvIo/RYvkY7ZaZO', 'asdfasfasdf', 'asdfasdfasdf', '2024-07-31', 0, 0, NULL, 0, ''),
(42, 'qweqweqwe', '$2y$10$dgN57BOiUYBfxKLRpwtHPuD2vMicvvw0XOHHhZquwk5ihTb0DVg5u', 'qwqweqwe', 'qweqweqweqwe', '2024-07-31', 0, 0, NULL, 0, ''),
(43, 'asdasdwfwefwef', '$2y$10$YAGiQYHWSYM9vU1ICV1fn.F7JWWfagrxHowCTEnG9coUz/lQW4Pbi', 'asdasd)', 'asdasdasd', '2024-07-31', 0, 0, NULL, 0, 'Screenshot 2024-07-30 212948.png'),
(44, 'nice', '$2y$10$tMmTbUel9MZrfJzQUWgHC.ZJNZ.p4A8vIeqI5fqvNW1cf6JNGwC4K', '<script>\r\n\r\nalert(\"HACKED\")\r\n\r\n</script>)', '<script>\r\n\r\nalert(\"HACKED\")\r\n\r\n</script>', '2024-08-01', 0, 0, NULL, 0, ''),
(45, 'sad boi in the house', '$2y$10$bh4z8hRmjg0YgAdqFeAAk.bM3bqjDYojCHf4I4Wz8DJufdqbixcr.', 'Hi L ! I miss you so much. ', 'Hi L ! I miss you so much. Guys! Pls. Don\'t do what i did, i met the perfect girl but instead of moving forward, i just went back to seeing my ex. Yeah i know i\'m stupid. Everything was on point when we where together. Idk why, i guess i was scared or something. I didn\'t know if we would last. I hope we could still be friends( it\'s been more than a year after all ). Maybe one day you\'ll forgive me and take me back. HAHA who am i kidding.', '2024-08-07', 0, 0, NULL, 0, 'd8e1ed70e82c07561c5eac8a40557a67.jpg'),
(46, 'icomplain', '$2y$10$y90DKKoIzCyiRbBps8dUJO9DJFlL0pNwAfPS9NbLYmEeP9sCHSQfi', 'boomer problems', 'admin is a boomer\r\ncares only about men’s basketball and women’s volleyball\r\ncensors the sad situation of the regular students and ignores suggestions unless legal action is threatened\r\nmade a bullshit reason to get rid of happy t and stupidly fight against the bar culture instead of more pressing issues (there have been more monday suspensions and no classes now lmao)\r\ndoes not even listen to the teachers of the students of the school and doesn’t give them support until they do something notable which makes them go to benilde\r\npresents the fake image of lasalle and tries so hard to censor the true reality\r\nis probably angry at entire student body for reasons to be happy at the student body\r\nprobably eats brunch at conti’s/mary grace with fellow boomers\r\nsecretly wishes and is trying to squeeze tuition money to rehire coach aldin ayo\r\nlaughs at ageless memes jef the eagle memes\r\nprobably has the make pana the eagle mobile game\r\n“back in my day...”\r\nallows the parties to get away with it\r\nprobably pocketed scholarship money because “hey, it’s free real estate”\r\ncontrols the new freedom wall\r\ntore down south gate and put a massive energy inefficient sign to weird flex on the admins of other schools\r\nsecretly wishes they were part of the “boracay team building”\r\nwishes they could steal as much money as santugon and be as unnoteworthy as tapat while doing it\r\nprobably spends more time outside of the school and playing golf at a country club\r\nstill uses yahoo\r\nhas a driver that picks them up in a dubai edition land cruiser ', '2024-08-07', 0, 0, NULL, 0, '47322874_1465225863609698_1109033681940381696_n.jpg'),
(47, 'orangutan', '$2y$10$mIpPjXUFa95e6J07ew2Rvetx9UAef74iSCdNAtQ1GEyFzULplf6by', 'Great wall', 'Hi! I\'m really interested in this girl who happens to be full Chinese. We\'ve started dating this year but there\'s this big barrier - the Great Wall. Her parents don\'t approve of me, but I can really see us moving forward in the future. Any tips? ????', '2024-08-07', 0, 0, NULL, 0, 'R.jpg'),
(48, 'labrador', '$2y$10$ZVaenaGZJpn0rRbicgYNR.U.N/eIgwgkfixl554MOpeASqDBFI5RK', 'Feelings', 'I am gonna let this all out before my feelings get deeper.\r\nI am so strange. I get easily attached to someone the moment we get close to each other. I am falling for him even though he does not feel the same way. I just can not help myself but to just think of him. The moments I am with him. What should I do? This is one of the things I hate the most. Getting attached so easily. \r\nYes, we are getting to know each other. Going out when we have time. If our sched lets us to. I am not really sure if he really has nothing for me. He is nice to be with. He is also a gentleman. Ugh! I hate this feeling. Really. I wanna avoid him but at the same time, wanna talk to him. We call each other manang/ading \'cause I am a year older than him. That is what we are. *sigh* What to do? I am weighing things out but too hard to decide on what I should really do. It is either we will go on this way or I will just avoid him. Should I? Or should I not?\r\nHere I am again. I must have learned from my past, eh. But, this heart of mine\'s just... I don\'t know. Pokmaru ever. My heart\'s taking over my mind. For the nth time.', '2024-08-07', 0, 0, NULL, 0, 'R (1).jpg'),
(49, 'shifter', '$2y$10$1Dka0aLxGw7DcIsz1x8soO6vDjvreCX2DJ5b87EDG4clJSyIaaNya', 'shifting', 'Hi CP majors! I\'m interested to shift to AEL. And I wanna know whats happening inside AEL and why is it different from other econ specializations. They told me it\'s a hard specialization to get into but it\'s worth it daw. Also are there certain requirements I need to attain before I opt to shift into AEL?\r\nHelp a frosh out ????????', '2024-08-07', 0, 0, NULL, 0, 'pngtree-student-confused-help-problem-student-vector-picture-image_10536845.png');

-- --------------------------------------------------------

--
-- Table structure for table `levelpoint`
--

CREATE TABLE `levelpoint` (
  `idx` int(11) NOT NULL,
  `userid` varchar(11) NOT NULL,
  `point` int(11) NOT NULL,
  `last_login` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `levelpoint`
--

INSERT INTO `levelpoint` (`idx`, `userid`, `point`, `last_login`) VALUES
(9, 'user', 0, NULL),
(11, 'aaa', 67, NULL),
(12, 'bbb', 0, NULL),
(13, '', 0, NULL),
(14, 'abc', 0, NULL),
(15, 'aaaaa', 1, NULL),
(16, 'qwerty', 62, NULL),
(17, 'bccc', 10, NULL),
(18, 'UYTR', 10, NULL),
(19, 'IUJHG', 10, NULL),
(20, 'jhgfdngfd', 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `idx` int(11) NOT NULL,
  `id` varchar(100) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`idx`, `id`, `pw`, `name`, `email`) VALUES
(2, 'user', '$2y$10$j8ph5eq8Jofad4dKt5x3rOmysTmtVjbNV00qfjXzk83ibnDDxurmm', 'user', NULL),
(4, 'aaa', '$2y$10$a8h/dERwDJiRLcc2Xj6ujOtw6x8HWevnej1vcxL0TDWxBNct.c6Tm', 'ccc', NULL),
(5, 'bbb', '$2y$10$AEYQN4Lu4wpfY/9TjJmqFO1yGN/ulggWbgxtOSnkqISI79WcdK3Yi', 'ccc', NULL),
(6, '', '$2y$10$EnN7/FnxjAz2Uu70VFdSfO76XetkdAf2rE2wmepju4zKrkZcBbzoC', '', NULL),
(7, 'abc', '$2y$10$wY/HUeJyZT03BAlHZUjv9OxSFUIcAV3wbLdrXVhizgbc8SkqLkVti', '', NULL),
(8, 'aaaaa', '$2y$10$tJDhuAOi4W/aLI3XKNaMcu8zhZhy3I09k7mx7X9kVhn0Jh/vwq32i', 'aaaaa', 'yoon0032@algonquinlive.com'),
(9, 'qwerty', '$2y$10$JFGTpBvIPQxZt9whOdSoF.9W5OjHYBDKLibViP2H7.HO68/D2Qb0m', '', 'qwerty@qwerty.com'),
(10, 'bccc', '$2y$10$FD397ifzkWRcrZn4TMZ4yObLgBk0HK604bDPw2XRQg3GQR8YXtt8W', '', 'a+1@algonquinlive.com'),
(11, 'UYTR', '$2y$10$/e1D2Lq7AN0aFIX2BYSSCeaqumsMJCklnxHn/N3DFVa8NIoHPXZ.K', '', 'a@algonquinlive.com'),
(12, 'IUJHG', '$2y$10$mTOXVsggV5fSY7NQOl3sL.qufm.6r7AiUPkoM/HbKAYW71KPJRO9G', '', 'a@algonquinlive.com'),
(13, 'jhgfdngfd', '$2y$10$uGn5FcwhYhveT24984S/husOdTpPOLJXSKimWlr270CrMeuC/v4nu', '', 'a@algonquinlive.com');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `idx` int(11) NOT NULL,
  `con_num` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`idx`, `con_num`, `name`, `pw`, `content`, `date`) VALUES
(1, 1, '313131', '$2y$10$xRB1jvBPAhao1lzUhcUfCut86LFNFfFO74ZCqz05PI/VeCGSfsH4u', 'asdasdasd', '2024-07-09'),
(2, 1, '343452354', '$2y$10$CigSCfh0xSvMe9fqOybGvuAoE6e066UfgOv0AjDjljupcyBsJB6y6', 'aaaaaaaaaaaaaaaaa', '2024-07-09'),
(3, 1, '1111', '$2y$10$mBpX.vWlIQfKbq/sozHy1.2pll1P5.sKnMMbcTYJChezVRbXXWj3a', '1111', '2024-07-09'),
(4, 1, 'asdasd', '$2y$10$dcYxhfpfhdogIW922zqmZOk8Q/PFf9cDlh3iYy2.dND7kJsGA.xCa', 'asdasd', '2024-07-09'),
(5, 2, 'asdasd', '$2y$10$YfsLYMy8XD4u7ihoHYq1G.4l.NiuDUA8WUEeJPSoLSZoM0Np9IoL.', 'asdasd', '2024-07-10'),
(6, 2, '123123', '$2y$10$lVIt4p7gSWhi.qhCJuna3.MWGnXnrE478BvwEk8.DcNe0aGcmHND.', '123123123', '2024-07-10'),
(7, 9, '1111', '$2y$10$KvudzXUJmJ5OYbfGLQ0vGuPi.aCRgatps.nG8fzMEv2ZgF3xVwahS', 'dsddfgvdfzvsdvc', '2024-07-23'),
(8, 9, 'weagseawFAGFDAFAFD', '$2y$10$9Vr6gqdNFWe5l1U5h3zC9u56wrvpUfdlR1s.9k6iqHILyV7jN4kou', 'SDFDFVASVSdfgbdfgbsfdsbgfdg', '2024-07-23'),
(9, 9, '1234', '$2y$10$nYef/qDIbOmVcwhGWGwOIudQcf9bfzj95YGyXhsjDQdIGLt/iBLGW', '1234', '2024-07-23'),
(10, 11, '111', '$2y$10$T/qzNho2H/UplSrTuB60ceNuLszxF69RS.bgsEMeB0oBiDp8iRBFq', 'sdsdfsdfsdf', '2024-07-23'),
(11, 18, 'aaa', '$2y$10$/9H1kqkcSLUrxPg.8HlcgeGnhBMsEIh6lDZ.lX2Km/qxEG/ng.9OC', 'qwerty', '2024-07-26'),
(12, 18, 'aaa', '$2y$10$pEgkktQoeG3HKJzmxJhnee56W9dCPpXnupSa0VOoBYnVSk2yCtPJW', 'asdffgfhgjvjv', '2024-07-26'),
(13, 27, 'asdasd', '$2y$10$bTxcU07kECzhr1O26MZQZuLhZDL46fYYMl/J1/.DTAwYCxrKUHPkW', 'asdasdasd', '2024-07-27'),
(14, 27, 'asdasd', '$2y$10$y9qjScQASDZzskDfjf3NwuZvy1.yZpAzJVYyaQLK01O8cmmVcbOTe', '1sfsadfasdfasd', '2024-07-27'),
(15, 28, 'andres', '$2y$10$8rp1NugwX2kLpyPaMadDleBbYrXTzZd1UEUjDPZR9HdNXvsEkNuJq', 'No. I\'m not. sfsdfsdfsdfssdfsdfsd', '2024-07-27'),
(17, 23, 'sadfsadfasdf', '$2y$10$eNzTxMM4zkkI5yZ8u699Q.96P7hK49c4bb8fVxh4xrNNT/wwrxYla', 'sdfsadfasdf', '2024-07-27'),
(19, 22, 'aaa', '$2y$10$FxfT8s7B5C6n0qSsWqOl6eUdZRfLiVBchWLbpkHgXqObUDTRZYWJy', 'aaa', '2024-07-27'),
(20, 23, 'asdasdasd', '$2y$10$qVgNjr5Cqxez.JdE.jv3Guv3hesGYDgNb69SW6waJdivtlEJZk/OS', 'sadfasdfasdfasdasdasdasd', '2024-07-27'),
(21, 23, 'sdfsdfsdfsdf', '$2y$10$l.2LAi5KMzlN4OJ8VOgdN.j2FFeWZzhnOaph3hqqdsjo5Yq9ef1Lm', 'dsfghjgfdgsfdasfghjfddsfdgfhfg', '2024-07-27'),
(22, 32, 'aa', '$2y$10$3nUDgVh6TcX5o18ScnJQFOp983N8zIgpBi.Ahwc9XbKAW2aONowk6', 'aaa', '2024-07-27'),
(23, 33, 'aaa', '$2y$10$53SwmbIdKHgxWp8VsSUMgOWDW94cBumsI9PCdCCiT6bsDvT9qGg.6', 'jQuery UI’s resizable method allows you to make any DOM element resizable, with various options to customize the resizing behavior. You can specify which handles to use for resizing, constrain the resize area, and trigger events during the resize process. Would you like to know how to implement it or have any specific questions about its features?', '2024-07-29'),
(24, 35, 'sfgdsggfsdfgd', '$2y$10$.IrML5vLr5VQh2C1ftfFgeBpTBJ/uXN5Gff/UPcEnwSbOWP.d09zu', 'aasfadasfgrshgsfgds', '2024-07-31'),
(25, 34, 'asdfasdf', '$2y$10$LwgKobNNiKEBeFxHNFsjVuLPDTiIyUoWbHzfdBIqC28DoD9xcq9F6', 'dfasdfasdf', '2024-07-31'),
(26, 33, 'aergwtesgerg', '$2y$10$nKsWtzcNp5lDrRj2n2Rudeg0P9bIkjqodvzQZ2HmC3TuVGnGTDj8m', 'awerwrfwefaerf', '2024-07-31'),
(27, 33, 'aergwtesgergasdfasf', '$2y$10$VwhWVobsqXgYzrzFpMrzZu1F1H4ILmuJ0HMhKs81DMyMwPn09hGTW', 'sdfagsfdgfasfsadfasdfasdf', '2024-07-31'),
(28, 32, 'sregsgshrth', '$2y$10$i7QdvLTBaJ1nVk6N1Bcxt.WTOBr.dPF4XoizW9r1d5O5VT/XMr1jO', 's4qw5h6j7tt6d5746sujherh', '2024-07-31'),
(29, 43, 'aaa', '$2y$10$evSgANRvCFKB7rvb.fJwteFlvInjfdF9tgGYcGHmgeK4FiNdrX4be', 'wrqwrfawfasf', '2024-08-06'),
(30, 45, 'acfwdb', '$2y$10$4Yb30vfhtQIQc1CVqY9.MuLa9M02o1WhHexYmNlTKy.tTrR79aRxO', 'I wonder how you are today, op. I just read this now and I hope you\'re okay :>', '2024-08-07'),
(31, 45, 'asas', '$2y$10$ShyZmNakaFi8hFBQP4ozkuywA8VmP1aMiTv.a96Q6tmV5BzY8.BIy', 'I know its really hard for you, but you have to let go.', '2024-08-07'),
(32, 45, 'panda', '$2y$10$//V7IQZa/G0WzaRZzneRPuv3AkcKXl4l0kxIb.vY0680eBpo0wLjq', 'I know its really hard for you, but you have to let go.', '2024-08-07'),
(33, 45, 'antman', '$2y$10$r2LSbKZLC1Gpu7qe0nXaQ.fRb8rOGHrg7L45U0tfnC2Cnv0rIp9wa', 'You deserve a better .why do you keep holding onto something thats not existing anymore? Give love and respect to your self ,will you? Stop hoping that things betwin you two will be ok,you\'re just hurting yourself a lot..godbless', '2024-08-07'),
(34, 46, 'manster', '$2y$10$6vchQffTg1ILhiPFE9YHr.8suM1wW.tYAmsITpN66s0Wgk7JUdZo2', 'i agreeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', '2024-08-07'),
(35, 47, 'nosense', '$2y$10$fyrOrW24IHDAECEfhieNKeQFrOe9ikEhAL.rSlWn48V9NOJjqwEWu', 'You\'re not in loved you\'re just interested and share some stuffs and stories. Just saying', '2024-08-07'),
(36, 47, 'Quitter', '$2y$10$8190w4P8dOzwaPXFP9M8Ru4WUocGJY3YYS4abRgxqVwts2Ms755zm', 'Quit!', '2024-08-07'),
(37, 48, 'heter101', '$2y$10$54GxoMnJdu9dr5qar0VC3OFX6IdGb16ZuKKOkjq9biNqWJdHuSCM.', 'HAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHA I\'ve got no words.', '2024-08-07'),
(38, 48, 'bag', '$2y$10$682DI9U/ruSfqFfhs91FWeXwL3dqWlCi7ODmTk1t2WX3Tdg1iW6BS', 'go for it!', '2024-08-07'),
(39, 49, 'acfwdb', '$2y$10$Y7bcsyX9swD5SSjKW9SPyOpSf1/Wf/e61CemHH0Gkl2hGVDSsP89y', 'nooooo. dont!!!!!!!', '2024-08-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `levelpoint`
--
ALTER TABLE `levelpoint`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`idx`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `levelpoint`
--
ALTER TABLE `levelpoint`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
