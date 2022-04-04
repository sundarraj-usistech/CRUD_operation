--
-- Table structure for table `crud_operation`
--

CREATE TABLE `crud_operation` (
  `e_id` int(5) NOT NULL,
  `e_name` varchar(30) NOT NULL,
  `e_designation` varchar(50) NOT NULL,
  `e_mail` varchar(30) NOT NULL,
  `e_doj` date NOT NULL,
  `e_phone` varchar(15) NOT NULL,
  `e_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crud_operation`
--
ALTER TABLE `crud_operation`
  ADD PRIMARY KEY (`e_id`),
  ADD UNIQUE KEY `e_mail` (`e_mail`),
  ADD UNIQUE KEY `e_phone` (`e_phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crud_operation`
--
ALTER TABLE `crud_operation`
  MODIFY `e_id` int(5) NOT NULL AUTO_INCREMENT;
  
ALTER TABLE `crud_operation` CHANGE `e_name` `e_name` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;
ALTER TABLE `crud_operation` CHANGE `e_mail` `e_mail` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;
ALTER TABLE `crud_operation` CHANGE `e_id` `employee_id` INT(5) NOT NULL AUTO_INCREMENT;
ALTER TABLE `crud_operation` CHANGE `e_name` `employee_name` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;
ALTER TABLE `crud_operation` CHANGE `e_designation` `employee_designation` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;
ALTER TABLE `crud_operation` CHANGE `e_mail` `employee_mail_id` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;
ALTER TABLE `crud_operation` CHANGE `e_doj` `employee_doj` DATE NOT NULL;
ALTER TABLE `crud_operation` CHANGE `e_phone` `employee_phone` VARCHAR(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;
ALTER TABLE `crud_operation` CHANGE `e_status` `employee_status` VARCHAR(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;
ALTER TABLE crud_operation RENAME TO employee_details;