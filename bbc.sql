-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220618.41c48b423e
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2022 at 11:41 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbc`
--
CREATE DATABASE IF NOT EXISTS `bbc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bbc`;

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `prezime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `korisnickoIme` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `lozinka` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `razina` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnickoIme`, `lozinka`, `razina`) VALUES
(12, 'Ante', 'Dragun', 'ante', '$2y$10$zrPiqhSGfe6Clki7UoJgmuT0iUetwc/tb1ZP/O2gsBzkQn55ZXgnS', 1),
(13, 'Ante', 'Dragun', 'ante1', '$2y$10$qc/fRnKG4pnkFj0Ts/D0NOY.j0BQXrzW.9bx/ZD7euJDqZFsdV1pe', 1),
(14, 'Ante', 'Dragun', 'ante2', '$2y$10$3A4UKGTxYpYCn7CYwaH3DOjzJZaPP5XlbWSBnNLdyfDu/NaQO5ssK', 1),
(15, 'Ante', 'Dragun', 'ante3', '$2y$10$NHHBsxwq.fWfppOKzvpWiO4zF0bShepicVzXFZAQ/gHbrPB3F40hm', 0),
(16, 'aa', 'aaaaaa', 'aaaaaaa', '$2y$10$Zs8RzymSap8rH84hQhgqGutb6WGU4DqnmWdrDfNn8IBs3UOGRljDS', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `naslov` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `sazetak` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `tekst` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `slika` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `kategorija` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(2, '16/06/2022', 'Biscuit heiress apologises over Nazi comments', 'Verena Baslsen faced a blacklash after defending her firm\'s use of forced labour during Nazi rule.', 'Verena Bahlsen, 25, had been accused of being \"oblivious to history\" and the company had distanced itself from her comments.\r\n\r\nBut after the backlash she admitted her remarks were inappropriate.\r\n\r\n\"It was a mistake to amplify this debate with thoughtless responses,\" Ms Bahlsen said in a statement\r\n\r\nBahlsen, which makes Choco Leibniz biscuits, employed about 200 forced labourers between 1943 and 1945 - most of whom were women from Nazi-occupied Ukraine.\r\n\r\nGuy Stern, a 97-year-old scientist whose family were killed in the Holocaust, also criticised Ms Bahlsen - telling reporters that she was talking about forced labourers \"from the high viewpoint of an heiress\".\r\n\r\nThe Social Democratic Party\'s general secretary Lars Klingbeil said: \"Someone who inherits such great wealth, also inherits responsibility and should not be so arrogant.\"\r\n\r\nAnd historian and writer Felix Bohr argued in Der Spiegel magazine that although Ms Bahlsen couldn\'t change her company\'s past, \"she must face up to its historical responsibility\".\r\n\r\nHe also criticised her \"obliviousness to history\".\r\n\r\nMs Bahlsen has now apologised, admitting her comments were thoughtless.\r\n\r\n\"Nothing could be further from my mind than to downplay national socialism or its consequences,\" she said in a statement on Wednesday.\r\n\r\nShe added that she recognised the need to learn more about the company\'s history.\r\n\r\n\"As the next generation, we have responsibility for our history. I expressly apologise to all whose feelings I have hurt,\" she said.', 'biskvit.jpg', 'KULTURA', 0),
(3, '16/06/2022', 'US snubs effort to tackle online extremism', 'The scheme aims to tackle terror content after the Christchurch attack, but the US opts out', 'The White House said on Wednesday it supported the Christchurch Call\'s aims but was \"not in a position to join\", citing the need for freedom of speech.\r\n\r\nThe comments came as five of the world\'s biggest tech companies pledged to tackle extremist material.\r\n\r\nThe Christchurch Call was launched in response to a deadly terror attack that was live streamed on Facebook.\r\n\r\nThe March attack launched by a lone gunman on two mosques in the New Zealand city of Christchurch left 51 people dead.\r\n\r\nThe Christchurch Call is a voluntary commitment by governments and tech companies to improve their efforts to tackle extremist content.\r\n\r\nIt was spearheaded by New Zealand Prime Minister Jacinda Ardern and French President Emmanuel Macron, who joined political and industry leaders in Paris on Wednesday to launch the action.\r\n\r\nThe text of the initiative outlines \"collective, voluntary commitments\" from governments and internet companies.\r\n\r\nThese include ensuring that there are effective counter-terrorism laws and that measures are being taken to remove extremist content from social media.\r\n\r\n\"All action on this issue must be consistent with principles of a free, open and secure internet, without compromising human rights and fundamental freedoms, including freedom of expression,\" it says.\r\n\r\n\"It must also recognise the internet\'s ability to act as a force for good, including by promoting innovation and economic development and fostering inclusive societies.\"\r\n\r\nIn its statement the White House said it supported the Christchurch Call\'s \"overall goals\" but was \"not currently in a position to join the endorsement\".\r\n\r\nWithout directly highlighting specific issues with the initiative, the statement stressed the need to protect free speech.\r\n\r\n\"We continue to be proactive in our efforts to counter terrorist content online while also continuing to respect freedom of expression and freedom of the press,\" it said.\r\n\r\n\"We encourage technology companies to enforce their terms of service and community standards that forbid the use of their platforms for terrorist purposes.\"\r\n\r\n\"We maintain that the best tool to defeat terrorist speech is productive speech and thus we emphasise the importance of promoting credible, alternative narratives as the primary means by which we can defeat terrorist messaging,\" it added.\r\n\r\nMr Macron said he wanted to get \"a more concrete and formal commitment\" from Washington, but saw the US\'s support of the overall goals \"as a positive element\".\r\n\r\nAs well as signing up to the largely symbolic document produced in Paris, leading tech companies agreed to a nine-point plan for putting the Christchurch pledges into action.\r\n\r\nAmong their commitments, Facebook, Amazon, Google, Twitter and Microsoft said they would update their terms of use to \"expressly prohibit the distribution of terrorist and violent extremist content\" and develop crisis protocols to respond to emerging or active events such as a terror attack.\r\n\r\nThe companies said they would also commit to publishing \"transparency reports\" on the detection and removal of terror or violent extremist content.\r\n\r\n\"Terrorism and violent extremism are complex societal problems that require an all-of-society response. For our part, the commitments we are making today will further strengthen the partnership that governments, society and the technology industry must have to address this threat,\" the companies said in a joint statement.', 'social.jpg', 'KULTURA', 0),
(4, '16/06/2022', 'Windows cleaner rescued from swinging lift', 'The workers in Oklahoma City were trapped about 50- storeys up as the lift began to swing out of control.\r\n\r\nSport', 'TWO WINDOW WASHERS have been rescued from a dangling scaffold above the roof of a 259-metre tall skyscraper in Oklahoma City. \r\n\r\nThe Oklahoma City Fire Department was called to Devon Tower following reports that the platform the workers were on was ?swinging out of control?. \r\n\r\n?Arriving firefighters witnessed the basket swinging violently at the very top of the tower. Glass was breaking and falling to the street below as the platform crashed into the tower,? the fire department said in a statement.\r\n\r\nUpon arrival at the scene during the morning rush hour, a cordon was put in place to ensure no one was hit by the falling debris. \r\n\r\nTechnical rescue specialists then made their way to the top of the tower. They secured rope bags to the building and then threw the bags up to where the workers were still swinging, well above the skyline.\r\n\r\nThe workers then secured the rope to their swinging platform, meaning firefighters were able to bring it under control.\r\n\r\nOnce the platform was stabilised, the workers were ultimately brought to safety. \r\nSpeaking to the Oklahoman,  a spokesman for the fire department, said it was ?a very tense and scary situation.?\r\n\r\nHe added that there was no indication of how the basket became loose.\r\n\r\nOne of the workers is believed to have sustained a minor injury to his shoulder, but otherwise, both men had a clean escape. ', 'zgrada.jpg', 'KULTURA', 0),
(33, '16/06/2022', 'Alonso unhurt after Indy practice crash', 'Two-time Formula 1 world champion Fernando Alonso escapes unhurt after crashing into a wall during practice for the Indianapolis 500.', 'The 37-year-old Spaniard is making his second attempt at the event but the accident on Wednesday was the latest in a series of setbacks this year.\r\n\r\nAlonso said he had made a \"mistake\", adding: \"It was understeer and even if I lifted the throttle on the entry of the corner, it was not enough.\r\n\r\n\"I completely lost the front aero. The wall came too close and too quickly.\"\r\n\r\nMcLaren have set up a new team to run Alonso at the prestigious Indy 500 this year as he seeks to become only the second man in history to complete motorsport\'s unofficial \'triple crown\', which also includes the Monaco Grand Prix and Le Mans 24 Hours, both of which he has already won.\r\n\r\nBut the team have suffered electronic problems that badly afflicted running in a test last month and then electrical problems cut short their first day of practice on Tuesday. The accident - at Turn Three on the oval track which has average speeds of about 230mph - has cost Alonso more mileage.\r\n\r\nAlonso had set 16th fastest time at the time of his accident, his 225.433mph average 3.4mph down on pace-setter Scott Dixon of the Ganassi team.\r\n\r\nAlonso, who was taken to the medical centre and released after checks, said: \"We will lose a little bit of running time again. I\'m sorry for the team, but we will learn and hopefully we will come back stronger tomorrow.\r\n\r\n\"We worked quite a lot on the car and definitely now it\'s quite damaged, so I feel sorry for the team and for my mistake, hopefully tomorrow we\'re back on track and back stronger.\"\r\n\r\nThe team said it was unlikely they would run again on Wednesday, but there was a small possibility they might get out for a few laps at the end of day if they felt they could get the car ready without rushing it.\r\n\r\nAlonso, who in 2017 qualified fifth with the Andretti team and led the race for 24 laps before retiring with an engine failure in the closing stages, has just two days of practice on Thursday and Friday remaining to prepare for qualifying, which runs over two days this weekend.\r\n\r\nSaturday defines positions 10 to 30 on the grid, as well as which nine drivers will go through to compete for pole position and the top positions on the grid on Sunday.\r\n\r\nThe fastest nine on Saturday then run again on Sunday to compete for pole position.', 'formula2.jpg', 'SPORT', 0),
(34, '16/06/2022', 'Sharapova pulls out of French Open', 'Two-time Franc Open winner Maria Sharapova will miss this year\'s event because of a shoulder injury.', 'PARIS, France - Maria Sharapova has withdrawn from the French Open 2019 because of an ongoing shoulder injury.\r\n\r\nThe 32-year-old, who made the fourth round of this year\'s Australian Open, has not played since pulling out of the St Petersburg Open in January, citing a problem with her right shoulder. \r\n\r\nSharapova, who won the Roland Garros title in 2012 and 2014, revealed her decision in a post on Instagram. She said: \"Withdrawing from the French Open, sometimes the right decisions aren\'t always the easy ones.\" \r\n\r\nSharapova ended her social media post on an upbeat note, adding: \"In better news, I have returned to the practice court, and slowly building the strength back in my shoulder.\"\r\n\r\nThe French Open begins on May 26 and runs to June 9 with defending champion Simona Halep and WTA World No.1 Naomi Osaka vying for the top seeding.\r\n\r\nPARIS, France - Maria Sharapova has withdrawn from the French Open 2019 because of an ongoing shoulder injury. The 32-year-old, who made the fourth round of this year\'s Australian Open, has not played since pulling out of the St Petersburg Open in January, citing a problem with her right shoulder.', 'maria.jpg', 'SPORT', 0),
(62, '18/06/2022', 'The top six summer transfer targets', 'BBC Sports David Ornstein look at the top summer transfer targets for the Premier League\'s top six clubs', 'Aston Villa: Quentin Merlin\r\nWe?re barely into June and Aston Villa have already completed a bulk of their summer business. Philippe Coutinho and Robin Olsen have made their loan moves permanent, while Diego Carlos and Boubacar Kamara have bolstered the defence and midfield, respectively. While Yves Bissouma would be the dream addition for Villa, a backup left-back is perhaps a greater need. Lucas Digne is first choice under Steven Gerrard, so a young understudy is key, with Quentin Merlin a rumoured target. The 20-year-old started 21 league games for Nantes last season and put up respectable averages of 2.1 tackles, 1.3 interceptions and 1.5 key passes per minutes in Ligue 1. Villa have already raided France for Kamara, so why not do so again for Merlin?\r\nArsenal: Gabriel Jesus\r\nWith Alexandre Lacazette leaving Arsenal this summer, Arsenal need a striker. Eddie Nketiah is likely to extend his stay but, with Arsenal returning to Europe, they need more forwards. Gabriel Jesus is a serious target, though Arsenal may face competition from Tottenham and Real Madrid. Despite playing just 1,880 minutes for Manchester City last season, the Brazilian was directly involved in 16 league goals, scoring eight. With Erling Haaland and Julián Álvarez arriving at City, Jesus is on his way out. The 25-year-old is a versatile forward who would be a fine addition to this youthful, free-flowing Arsenal attack.', 'igraci.jpg', 'SPORT', 0),
(79, '19/06/2022', 'Darwin Nunez', 'Sadio Mane\'s exit for Bayern Munich ', 'Over the past week, there has been discourse suggesting the signing of Darwin Nunez spelled the end of Sadio Mane\'s Anfield career.\r\n\r\nPrior to the Champions League final, Mohamed Salah\'s assertion that he would be remaining at Liverpool this summer sparked the same talk: a new beginning for the Senegal international.\r\n\r\nMane has earned a fresh challenge, surroundings, and responsibility while Liverpool continue their process of advancing the squad without being heavily clouded by sentiment.\r\n\r\nBack in 2018, when the club prioritised a policy of retention and tied Roberto Firmino, Salah and Mane down with new long-term contracts, they visualised a number of scenarios.', 'igraci.jpg', 'SPORT', 0),
(80, '19/06/2022', 'Darwin Nune', 'Sadio Mane\'s exit for Bayern Munich ', 'Over the past week, there has been discourse suggesting the signing of Darwin Nunez spelled the end of Sadio Mane\'s Anfield career.\r\n\r\nPrior to the Champions League final, Mohamed Salah\'s assertion that he would be remaining at Liverpool this summer sparked the same talk: a new beginning for the Senegal international.\r\n\r\nMane has earned a fresh challenge, surroundings, and responsibility while Liverpool continue their process of advancing the squad without being heavily clouded by sentiment.\r\n\r\nBack in 2018, when the club prioritised a policy of retention and tied Roberto Firmino, Salah and Mane down with new long-term contracts, they visualised a number of scenarios.', 'social.jpg', 'KULTURA', 0),
(81, '19/06/2022', 'Darwin Nune', 'Sadio Mane\'s exit for Bayern', 'Over the past week, there has been discourse suggesting the signing of Darwin Nunez spelled the end of Sadio Mane\'s Anfield career.\r\n\r\nPrior to the Champions League final, Mohamed Salah\'s assertion that he would be remaining at Liverpool this summer sparked the same talk: a new beginning for the Senegal international.\r\n\r\nMane has earned a fresh challenge, surroundings, and responsibility while Liverpool continue their process of advancing the squad without being heavily clouded by sentiment.\r\n\r\nBack in 2018, when the club prioritised a policy of retention and tied Roberto Firmino, Salah and Mane down with new long-term contracts, they visualised a number of scenarios.', 'biskvit.jpg', 'SPORT', 1),
(84, '19/06/2022', 'sadio mane', '                aaaaaaaaaaaaa        ', '                aaaaaaaaaaaaa        ', 'maria.jpg', 'SPORT', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnickoIme` (`korisnickoIme`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



