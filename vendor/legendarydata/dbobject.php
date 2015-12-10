<?php
 /* @filename lib/dbobject.php
  * @description class DBObject
  * @created_at 20120623
  * @author D.Hopley / D.Feiveson
  * @updated_at 20120624
  */

class DBObject {
        var $dbHost;
        var $dbPwd;
        var $dbUser;
        var $dbDB;
        // Stores all the result handlers in an array indexed by query id
        var $dbResults;
        // Stores the Total # of rows for a limit query indexed by query id
        var $dbCounts;
        // Helps keep track of the next query id to be used
        var $dbQueryId;
        var $dbH;

	public function __construct() {
		//get a config object -- from lib/constants.inc
		//  $this->log = new dlog;
		//$conf = new ConfigObject;
		$this->dbHost = ConfigObject::Get( "DBHost" ); //$conf->dbHost;
		$this->dbUser = ConfigObject::Get( "DBUser" ); //$conf->dbUser;
		$this->dbPwd = ConfigObject::Get( "DBPassword" ); //$conf->dbPwd;
		$this->dbDB = ConfigObject::Get( "DBName" ); //$conf->dbDB;
		// get database config info
		//open a database connection
		//store $dbo in session || pass back an object
		$this->dbResults = array();
		$this->dbCounts = array();
		$this->dbQueryId = 0;
		try {
		$this->Connect();
		}
		// catch(DatabaseConnectionException $e) {
		catch(Exception $e) {
		/*
		$msg = "  dbObject::construct error Connect \$e: " . $e;
		$this->log->msg($msg);
		*/
		throw $e;
		}
		if(!mysql_select_db($this->dbDB,$this->dbH)) {
		/*
		$msg = "  dbObject::construct error selecting  db: " . $this->dbDB;
		$this->log->msg($msg);
		*/
		//throw new DatabaseConnectionException(mysql_error());
		}

		/*
		$msg = "  dbObject::construct complete";
		$this->log->msg($msg);
		*/

	}//end __construct()
	//
	protected function Connect() {
		if(!$this->dbHost) {
			$this->oError->LogError('DatabaseManager::Connect()','unspecified host');
			throw new DatabaseConnectionException('Unspecified host');
		}
		$this->dbH = mysql_connect($this->dbHost,$this->dbUser,$this->dbPwd) ;
		if (!$this->dbH) {
			$this->oError->LogError('DatabaseManager::Connect()',mysql_error());
			throw new DatabaseConnectionException(mysql_error());
		}
	}

	//
	public function Create($name){


	}//end Create()
	//
	public function Read($name) {
	//$dbo = new dbobject();

	}//end Read()
	//
	public function Update($sql) {
		$msg = " in DBObject::Update where sql: " . $sql;
		$result  = mysql_query($sql,$this->dbH);
	}//end Update()
	//
	function Delete($sql) {
		$res  = mysql_query($sql,$this->dbH);
		if (!$res) {
		$this->oError->LogError('DatabaseManager::Delete()','[' . $sql . '] ' . mysql_error());
		throw new Exception(mysql_error());
		}
	
		return $res;
	}
	//
	public function Close() {
		mysql_close($this->dbH);
	}
	//
	public function Select($sql) {
		$msg = " in DBObject::Select where sql: " . $sql;
		//  $this->log->msg($msg);
		$result  = mysql_query($sql,$this->dbH);
		if (!$result) {
	
			throw new Exception(mysql_error());
		}

		// the query id will always start with 1
		$this->dbQueryId++;
		$this->dbResults[$this->dbQueryId] = $result;
		return $this->dbQueryId;
	}

	public function Insert($sql) {
		$result  = mysql_query($sql,$this->dbH);
		$iId = mysql_insert_id();
		//$this->oError->LogError('DatabaseManager::Insert',$sql);       
		if (!$result){
			throw new Exception(mysql_error());
		}
		$this->dbQueryId++;
		$this->dbResults[$this->dbQueryId] = $iId;
		//$this->oLog->LogError('Insert',$iId);
		return $this->dbQueryId;
	}
	
	public function GetRow($queryid) {
		if (!$queryid) {
			$this->oError->LogError('DatabaseManager::GetRow()',"Bad queryid: $queryid");
			throw new DatabaseQueryException("Bad queryid: $queryid");
		}

		return mysql_fetch_assoc($this->dbResults[$queryid]);
	}

	public function GetNumRows($queryid) {
		if (!$queryid) {
			$this->oError->LogError('DatabaseManager::GetNumRows()',"Bad queryid: $queryid");
			throw new DatabaseQueryException("Bad queryid: $queryid");
		}
		return mysql_num_rows($this->dbResults[$queryid]);
	}

	public function GetInsertId($queryid) {
		return $this->dbResults[$queryid];
	}

	public static function EscapeString( $str ) {
		return str_replace( "'", "\'", $str );
	}

}
/* sql creation */
/*
Create table User (
Id int(11) unsigned not null auto_increment,
Name varchar(100),
Email varchar(150),
AccessKey varchar(200) not null,
EnvironmentKey varchar(200) not null,
CreateDate timestamp default CURRENT_TIMESTAMP,
primary key (Id)
);

INSERT INTO User (Name, Email, AccessKey, EnvironmentKey) VALUES
('Root', 'root@legendarydata.com', '3CWfCGj8xP915sSbx2RdfrojC', '4vhe13fjRW6YpedQB5K1maWQF');

Create table Environment (
Id int(11) unsigned not null,
Name varchar(100) not null,
EKey varchar(100) not null,
DateCreated timestamp default CURRENT_TIMESTAMP,
primary key (Id)
);

ALTER Table Environment add column NAMark varchar(20) default 'NA';
ALTER Table Environment add column StateIds varchar(100) default '';

CREATE table HomeEnvironment (
AdminId int(11) unsigned not null,
EnvironmentId int(11) unsigned not null,
DateCreated timestamp default CURRENT_TIMESTAMP,
primary key (AdminId, EnvironmentId)
);

CREATE table ListClassification (
Id int(11) unsigned not null,
Name varchar(100) not null,
DateCreated timestamp default CURRENT_TIMESTAMP,
primary key (Id)
);

INSERT INTO ListClassification
(Id, Name) VALUES
 (2,'Accounting Firms'),
 (4,'Advertising Agencies'),
 (5,'Apartments'),
 (6,'Architectural Firms'),
 (7,'Assisted Living Facilities'),
 (8,'Attractions/Museums'),
 (9,'Auto Dealerships'),
 (10,'Banks/Financial Institutions'),
 (11,'Meeting and Convention Facilities'),
 (12,'Janitorial Firms/Building Maintenance'),
 (13,'Call Centers/Customer Service'),
 (14,'Catering Companies'),
 (15,'Wireless Communication'),
 (16,'Chambers of Commerce'),
 (17,'Charitable Trusts'),
 (18,'Child Care Centers/Day Care Centers'),
 (19,'Houses of Worship'),
 (20,'Colleges & Universities'),
 (21,'Commercial Real Estate Developers'),
 (22,'Commercial Lenders'),
 (23,'Printing Companies'),
 (24,'Commercial Real Estate Firms'),
 (25,'Computer Consultants'),
 (26,'Computer Hardware Companies'),
 (27,'Computer Retailers/Resellers/Dealers'),
 (28,'Software Developers/Computer Software Companies'),
 (29,'Computer Training Companies'),
 (30,'Conventions/Trade Shows/Events'),
 (31,'Credit Unions'),
 (32,'Drug Rehabilitation Centers'),
 (33,'Electrical Contractors'),
 (34,'Employee Benefits Companies'),
 (35,'Employers'),
 (37,'Engineering Companies'),
 (38,'Environmental Consultants/Services/Engineering'),
 (39,'Equipment Leasing Companies'),
 (40,'Family Owned Businesses'),
 (41,'Fastest Growing Companies'),
 (42,'Festivals'),
 (43,'Financial Planning'),
 (44,'Florists'),
 (45,'Furniture Companies'),
 (46,'General Contractors'),
 (47,'Golf Courses'),
 (48,'Health Clubs'),
 (49,'Heating, Ventilating, Air Conditioning (HVAC) Contractors'),
 (50,'Highest-Paid Executives'),
 (51,'Health Maintenance Organizations (HMOs)'),
 (52,'Home Builders'),
 (53,'Home Health Agencies'),
 (54,'Hospitals'),
 (55,'Hotels/Motels'),
 (56,'Information Systems/Information Technology Companies'),
 (57,'IPOs/Stock Offerings'),
 (58,'Insurance Companies'),
 (59,'Interior Design/Construction Companies'),
 (60,'Internet Service Providers'),
 (61,'Law Firms'),
 (62,'Lottery Retailers'),
 (63,'Management Consultants'),
 (64,'Manufacturing Firms'),
 (65,'Public Relations Agencies'),
 (66,'MBA Programs'),
 (67,'Mechanical Contractors'),
 (68,'Mergers & Acquisitions'),
 (69,'Women Owned Businesses'),
 (70,'Mortgage Lenders and Brokers'),
 (71,'Moving & Storage Companies'),
 (72,'Nonprofit Organizations'),
 (73,'Nursing Homes/Elder Care Facilities'),
 (74,'Office Equipment Companies'),
 (75,'Office Management Companies'),
 (76,'Oldest Businesses'),
 (77,'Optical Centers'),
 (78,'Surgery Centers'),
 (79,'Performing Arts Organizations'),
 (80,'Physician Groups/IPAs'),
 (81,'Plastic & Cosmetic Surgeons'),
 (82,'Preferred Provider Organizations (PPOs)'),
 (83,'Private Companies'),
 (84,'Schools'),
 (85,'Property Management Firms'),
 (86,'Public Companies'),
 (87,'Publications'),
 (88,'Radio Stations/Radio Broadcasting Companies'),
 (89,'Recycling Companies'),
 (90,'Residential Real Estate Firms'),
 (91,'Restaurants'),
 (92,'Retirement Communities'),
 (93,'Roofing Contractors'),
 (94,'Savings & Loans'),
 (95,'School Districts'),
 (96,'Shopping Centers'),
 (97,'SBA Lenders'),
 (98,'Snow Ski Resorts/Areas'),
 (99,'Stockbrokerage Firms'),
 (100,'Subsidiaries'),
 (103,'Temporary Employment Agencies'),
 (104,'Title Companies'),
 (105,'Travel Agencies'),
 (106,'Trucking Companies'),
 (107,'United Way Allocations and Recipients'),
 (108,'Emergency Rooms/Urgent Care Centers'),
 (109,'Web Design/Hosting Companies'),
 (110,'Wineries'),
 (111,'Maternity Departments'),
 (112,'Landscape Contractors/Architects'),
 (113,'Recruitment Firms'),
 (114,'Tax Preparation Firms'),
 (115,'Airlines'),
 (117,'Directors Fees'),
 (118,'POS Organizations'),
 (119,'Industrial Parks'),
 (120,'Labor Unions'),
 (122,'Commercial Property Values'),
 (123,'Computer Peripherals Manufacturers'),
 (124,'Computer Networking Companies'),
 (125,'Multimedia Companies'),
 (126,'Medical Device Companies'),
 (127,'Market Research Firms'),
 (128,'Film/Video Production Companies'),
 (129,'Exclusive Provider Organizations (EPOs)'),
 (130,'Professional Organizations/Associations'),
 (131,'Real Estate Investment Trusts (REITs)'),
 (132,'Residential Real Estate Developers'),
 (133,'Security/Alarm Companies'),
 (134,'Semiconductor Manufacturers'),
 (135,'Semiconductor Equipment Manufacturers'),
 (136,'Venture Capital Firms/Deals'),
 (137,'Biotechnology/Bioscience Companies'),
 (138,'Libraries'),
 (139,'Packaging Companies'),
 (140,'Telecommunications Cos./Equipment/Retailers'),
 (141,'Television Stations/Television Broadcasting Companies'),
 (142,'Masonry Contractors'),
 (143,'Sports Attractions'),
 (144,'Graphic Designers'),
 (145,'Mailing Services'),
 (146,'Sign Companies'),
 (147,'Swimming Pool Contractors'),
 (148,'Highway/Heavy Construction Contractors'),
 (149,'Real Estate Appraisal Firms'),
 (150,'Messenger and Courier Services'),
 (151,'Energy Companies'),
 (152,'Liquor Stores'),
 (153,'Customs Brokers'),
 (154,'Health Care Systems/Companies'),
 (155,'Freight Carriers'),
 (156,'Mutual Funds'),
 (157,'Cities and Municipalities'),
 (158,'Managed Care Plans'),
 (159,'Government Contractors'),
 (160,'Entertainment Venues'),
 (161,'Country Clubs'),
 (162,'Health Clinics/Centers'),
 (163,'Photographers'),
 (164,'Chemical Producers'),
 (165,'Foreign Owned Companies'),
 (168,'Luncheon Clubs'),
 (169,'Who\'s Who/People of Influence/Award Winners'),
 (170,'Airports'),
 (171,'Real Estate Agents'),
 (172,'Rehabilitation Centers'),
 (173,'Technology Companies'),
 (174,'Miscellaneous'),
 (175,'Investment Banking Firms'),
 (176,'Warehouses'),
 (177,'Importers'),
 (178,'Casinos'),
 (179,'Franchisors'),
 (180,'Land Developers'),
 (181,'Breweries'),
 (182,'Marinas/Harbors'),
 (183,'Public Transit Services'),
 (184,'Freight Forwarders'),
 (185,'Retailers'),
 (186,'Distribution Centers'),
 (187,'Funeral Homes'),
 (188,'Psychiatric Centers'),
 (189,'Relocation Companies'),
 (190,'Event Planners'),
 (191,'Real Estate Owners'),
 (192,'Promotions/Promotion Products Firms'),
 (193,'Landfills'),
 (194,'Laboratories'),
 (195,'Corporate Philanthropists'),
 (196,'Political Action Committees'),
 (197,'Aerospace/Aviation Companies'),
 (198,'Electronics Companies'),
 (199,'Business Improvement Organizations'),
 (200,'Mining Companies'),
 (201,'Pension Funds'),
 (202,'Executive Suites'),
 (203,'Medical Suppliers'),
 (204,'Residential Communities'),
 (205,'Plumbing Contractors'),
 (206,'Parks'),
 (208,'Car Rental Agencies'),
 (209,'Court Reporting Firms'),
 (210,'Office Buildings'),
 (211,'Office Parks'),
 (212,'Permanent Employment Agencies/Placement Firms'),
 (213,'Insurance Brokerages'),
 (214,'Collection Agencies'),
 (215,'Vacation Resorts'),
 (216,'Exporters'),
 (225,'Patents'),
 (227,'Economic Development Agencies'),
 (228,'Charitable Foundations'),
 (229,'Graduate School Programs'),
 (231,'Commercial Real Estate Transactions'),
 (232,'Residential Real Estate Transactions/Most Expensive Homes'),
 (233,'Construction Projects'),
 (234,'Jewelers'),
 (235,'Motorcycle Dealers'),
 (236,'Boat Dealers'),
 (237,'Physical and Occupational Therapy'),
 (238,'Executive Search Firms'),
 (239,'Money Management Firms'),
 (240,'Franchisers'),
 (241,'Highest Paid Public Officials'),
 (242,'Highest Paid Athletes'),
 (243,'Highest Paid Occupations'),
 (244,'Minority-Owned Businesses'),
 (245,'Office Furniture Companies'),
 (246,'Office Supply Companies'),
 (247,'Office Furniture Stores/Retailers'),
 (248,'Copy Centers'),
 (249,'SBA Loans'),
 (250,'Air Charter Companies'),
 (251,'Air Cargo Companies'),
 (252,'Apartment Communities'),
 (253,'Continuing Care Communities'),
 (254,'Leases'),
 (255,'Lobbyists'),
 (256,'Third Party Administrators'),
 (257,'Best Places to Work'),
 (258,'Fundraising Events'),
 (259,'Residential Furniture Stores/Retailers'),
 (260,'Defense Contractors'),
 (261,'Diagnostic Centers'),
 (263,'Weight-Loss Clinics'),
 (264,'Extended Stay Providers'),
 (265,'Residential Remodelers/Contractors'),
 (266,'Private Equity Firms'),
 (267,'Verdicts and Settlements/Jury Awards'),
 (268,'Executive Golden Parachutes'),
 (269,'Limousine and Car Services'),
 (270,'National Science Foundation Grants'),
 (271,'National Institute of Health Grants'),
 (272,'Largest Taxpayers'),
 (273,'Top Performing CEO's and Executives'),
 (274,'Building Material Suppliers'),
 (275,'Foreign Offices/Consulates'),
 (276,'Community Associations'),
 (277,'Condominiums'),
 (278,'Crab Houses'),
 (279,'OSHA Citations'),
 (280,'Largest Layoffs'),
 (281,'Hospital Procedures'),
 (282,'Thoroughbred Horses'),
 (283,'Thoroughbred Horse Sires'),
 (284,'Payroll Service Providers'),
 (285,'Specialty Subcontractors'),
 (286,'Alternative Dispute Resolution Firms'),
 (287,'Best Selling Cars and Trucks'),
 (288,'Hedge Funds'),
 (289,'Toxic Emissions'),
 (290,'Wealthiest ZIP Codes'),
 (291,'NASCAR Teams'),
 (292,'40 Under Forty'),
 (293,'Water Users'),
 (294,'Data Storage Companies'),
 (295,'Auction Companies'),
 (296,'Exterminators/Pest Control'),
 (297,'Carpet and Flooring Companies'),
 (298,'Adult Day Care Centers'),
 (299,'Building Permits'),
 (300,'Recording Studios'),
 (301,'Emergency Medical Services'),
 (302,'Bed and Breakfasts'),
 (303,'Parking Facilities'),
 (304,'Military Facilities'),
 (305,'Solar Hot Water Contractors'),
 (306,'Wedding Planners'),
 (307,'Pharmaceutical Companies'),
 (308,'Brownfield Sites'),
 (309,'Painting Contractors'),
 (310,'Photovoltaic Contractors'),
 (311,'Certified Green Enterprises'),
 (312,'Alumni Groups'),
 (313,'Grocery Store Companies'),
 (315,'Residential Real Estate Developments'),
 (316,'Metro Bus Routes'),
 (317,'Research Companies'),
 (619,'Number One Companies'),
 (620,'Grant and Award Recipients'),
 (621,'Cabling Companies'),
 (622,'Art Galleries'),
 (623,'Highest Taxpayers'),
 (624,'Day Spas'),
 (625,'Employee Leasing Firms'),
 (626,'International Companies'),
 (627,'Foreign Consulates'),
 (628,'Government Loans'),
 (629,'Golf Handicaps'),
 (630,'Antique Stores'),
 (631,'Logistics Companies'),
 (632,'Golf Courses, Public'),
 (633,'Golf Courses, Private'),
 (634,'Mortgage Lenders-Brokers, Commercial'),
 (635,'Mortgage Lenders-Brokers, Residential'),
 (636,'Employers, Private'),
 (637,'Employers, Public'),
 (638,'Employers, Government'),
 (639,'Zip Codes, General'),
 (640,'Human Service Organizations'),
 (641,'Bank Holding Companies'),
 (642,'Trust Organizations'),
 (643,'Insurance, Life'),
 (644,'Lending Institutions'),
 (645,'Colleges, Community'),
 (646,'Commercial Real Estate Developments'),
 (647,'Performing Arts Events'),
 (648,'Sporting Events'),
 (649,'Events'),
 (650,'United Way Donors'),
 (651,'Employers, Specific Area One'),
 (652,'Employers, Specific Area Two'),
 (653,'Employers, Specific Area Three'),
 (654,'Employers, Specific Area Four'),
 (655,'Employers, Specific Area Five'),
 (656,'Employers, Specific Area Six'),
 (657,'Insurance, Property & Casualty'),
 (658,'Law Firms, Entertainment'),
 (659,'Law Firms, Bankruptcy'),
 (660,'Banquet Facilities'),
 (661,'Small Business Lenders'),
 (662,'Zip Codes, Charitable'),
 (663,'Commercial Real Estate Brokers/Agents'),
 (664,'Residential Real Estate Agents/Brokers'),
 (665,'LEED Certified Projects'),
 (666,'LEED Certified Spaces'),
 (667,'Food Processors'),
 (668,'Corporate Philanthropy-Direct Giving'),
 (669,'Corporate Philanthropy-Foundations'),
 (670,'Property Managers, Commercial'),
 (671,'Property Managers, Single-Family'),
 (672,'Property Managers, Multifamily'),
 (673,'Property Managers-Homeowners Associations'),
 (674,'Schools, Adult Vocational'),
 (675,'Schools, K-12'),
 (676,'Law Firms, Litigation'),
 (677,'Home Builders, Custom'),
 (678,'Home Builders, Production'),
 (679,'Public Entity Risk Pools'),
 (680,'Ski Resorts, Downhill'),
 (681,'Ski Resorts, Cross Country'),
 (682,'Franchisees'),
 (683,'Aerospace Contractors'),
 (684,'Health-Care Heroes'),
 (685,'Expansions and Relocations'),
 (686,'General Contractors, Green'),
 (687,'Architectural Firms, Green'),
 (688,'Home Builders, Green'),
 (689,'Property Management, Commercial'),
 (690,'Property Management, Residential'),
 (691,'Engineering Firms, Civil/Structural'),
 (692,'Engineering Firms, Energy'),
 (693,'Fastest Growing Companies, Technology'),
 (694,'Public Companies, Energy'),
 (695,'United Way Campaigns'),
 (696,'Charitable Organizations'),
 (697,'Schools, Private'),
 (698,'Schools, Public'),
 (699,'Schools, Special Needs'),
 (700,'Hotels, Boutique'),
 (701,'Professional and Trade Organizations'),
 (702,'Homes, Most Expensive'),
 (703,'Hospices'),
 (704,'Oilfield Equipment'),
 (705,'Telecommunication Equipment Companies'),
 (706,'Telecommunication Retailers'),
 (707,'Telecommunication Service Companies'),
 (708,'Auto Dealerships, New'),
 (709,'Auto Dealerships, Pre-Owned'),
 (710,'Security/Alarm Equipment Companies'),
 (711,'Security/Alarm Service Companies'),
 (712,'Mortgage Lenders'),
 (713,'Mortgage Brokers'),
 (714,'Breweries2'),
 (715,'Distilleries'),
 (716,'Home Care Agencies'),
 (717,'Employers, Technology'),
 (718,'Employers, Business'),
 (719,'Hospitals, Specialty'),
 (720,'Law Firms, Intellectual Property'),
 (721,'Law Firms, Specific Region'),
 (722,'Systems Integrators'),
 (723,'Physician Organizations'),
 (724,'Incentives, Job-Creating'),
 (725,'Boat Manufacturers'),
 (726,'Banks-Locally Based'),
 (729,'Vacancies'),
 (730,'Interior Design Firms'),
 (731,'Interior Finish Out Firms'),
 (732,'Mental Health Facilities'),
 (733,'Durable Medical Equipment'),
 (734,'Specialized Healthcare'),
 (735,'Medical Technology Companies'),
 (736,'Law Firms, Construction'),
 (737,'Law Firms, Real Estate'),
 (738,'Law Firms, Employment'),
 (739,'Office Buildings, Zone One'),
 (740,'Office Buildings, Zone Two'),
 (741,'Office Buildings, Zone Three'),
 (742,'Office Buildings, Zone Four'),
 (743,'Office Buildings, Zone Five'),
 (744,'Gas Production Companies'),
 (745,'Oil Production Companies'),
 (746,'Property Management, Office'),
 (747,'Property Management, Industrial'),
 (748,'Commercial Property Leasing'),
 (749,'Real Estate Agents, Commercial'),
 (750,'Real Estate Agents, Residential'),
 (751,'Landscapers, Commercial'),
 (752,'Veteran Owned'),
 (753,'Hispanic Owned'),
 (754,'American Indian Owned'),
 (755,'Banks, Community'),
 (756,'Caterers, Hotel'),
 (757,'Chamber or Commerce, Hispanic'),
 (758,'Education, Professional, Guide'),
 (759,'Education, Continuing'),
 (760,'Colleges, Technology Programs'),
 (761,'Mortgage Brokers, Commercial, Bankers'),
 (762,'Commercial Real Estate Brokerages'),
 (763,'CRE National Portfolios'),
 (764,'Fastest Growing Companies, Private'),
 (765,'Commercial Contractors'),
 (766,'Golf Courses, Toughest'),
 (767,'Communities, Golf Course'),
 (768,'Organizations, Networking'),
 (769,'Residential Real Estate Organizations'),
 (770,'Residential Real Estate Companies'),
 (771,'Residential Real Estate Offices'),
 (772,'SBA Certified Development Companies'),
 (773,'Foreign-Owned Subsidiaries'),
 (774,'Landscape Architects, Commercial'),
 (775,'Industrial Buildings'),
 (776,'Distribution Centers, Business'),
 (777,'Marketing Services Firms'),
 (778,'Interactive Media  Agencies'),
 (779,'Incubators'),
 (780,'Technology Services'),
 (781,'State Parks'),
 (782,'Build to Suits'),
 (783,'Office Complexes'),
 (784,'Office Condos'),
 (785,'Foundations, Independent'),
 (786,'Foundations, Company Sponsored'),
 (787,'Foundations, Community'),
 (788,'Executive Search Firms, Retained'),
 (789,'Executive Search Firms, Contingency'),
 (790,'Chief Information Officers'),
 (791,'Minority Resources'),
 (792,'Leases, Office'),
 (793,'Leases, Industrial'),
 (794,'Best Places to Work, Large'),
 (795,'Best Places to Work, Medium'),
 (796,'Best Places to Work, Small'),
 (797,'International Firms'),
 (798,'Colleges, Business & Technical'),
 (799,'Insurance, Life and Health'),
 (800,'100 Black Men'),
 (801,'Colleges, Specialty'),
 (802,'Highest Paid County Officials'),
 (803,'Solar and Renewable Energy Companies'),
 (804,'Veteran Owned, Service Disabled'),
 (805,'Business Development Resources'),
 (806,'Real Estate Teams'),
 (807,'Concrete Contractors'),
 (808,'Woodworking Companies'),
 (809,'Venture Capital Firms'),
 (810,'Venture Capital Deals'),
 (811,'Angel Investors'),
 (812,'Clean Technology Companies'),
 (813,'Newspapers, Free'),
 (814,'Newspapers, Paid'),
 (815,'Gaming Companies'),
 (816,'Private Equity Deals'),
 (817,'Utility Companies'),
 (818,'Construction Management Companies'),
 (819,'Employers, Specific Area Seven'),
 (820,'Employers, Specific Area Eight'),
 (821,'Employers, Specific Area Nine'),
 (822,'Construction Projects, Area One'),
 (823,'Construction Projects, Private'),
 (824,'Construction Projects, Public'),
 (825,'Employment Agencies'),
 (827,'Residential Mortgage Top Producers'),
 (828,'Tattoo Parlors'),
 (829,'Recyclers, Electronic'),
 (830,'Construction Project Companies'),
 (831,'Nonprofit Organizations-atl.only'),
 (832,'Commercial Property Owners'),
 (833,'Remodelers, Commercial'),
 (834,'Remodelers'),
 (835,'Cancer Centers'),
 (836,'Wealth Advisors'),
 (837,'Investment Advisors'),
 (839,'Computer Service and Repair'),
 (840,'HMOs and PPOs'),
 (841,'Private Companies, Minimum Revenue 10 Million'),
 (842,'Employment Agencies, Technical and Technology'),
 (843,'Property Management, Retail'),
 (844,'Clubs'),
 (845,'Schools, Charter'),
 (846,'Dental'),
 (847,'Economic Development Corp. Loans'),
 (848,'Professional Associations'),
 (849,'Trade Associations'),
 (850,'Best Places to Work: Small'),
 (851,'Best Places to Work: Medium'),
 (852,'Best Places to Work: Large'),
 (853,'Best Places To Work: Micro'),
 (854,'Pest Control or Exterminators'),
 (855,'Chief Financial Officers'),
 (856,'Leases, Retail'),
 (857,'County Positions Area One'),
 (858,'County Positions Area 2'),
 (859,'County Positions Area Three'),
 (860,'County Positions Area Four'),
 (861,'Pension Plan Administrators'),
 (862,'Intersections'),
 (863,'Cardiology Practices'),
 (864,'Arts Organizations, General'),
 (865,'Independent Living Centers'),
 (866,'Independent Practice Associations'),
 (867,'Urgent Care Centers'),
 (868,'Golf Charity Tournaments'),
 (869,'Commercial Real Estate Apprasiers'),
 (870,'Residential Real Estate Appraisers'),
 (871,'Banks, Green'),
 (872,'Convention and Visitor Bureaus'),
 (873,'Venture Capital Deals-Clean Technology'),
 (874,'Venture Capital Deals-Biotechnology'),
 (875,'Health Associations-Organizations'),
 (876,'Federal Stimulus Funded Projects'),
 (877,'Companies Seeking Venture Capital'),
 (878,'Social Networking Web Site Companies'),
 (879,'Schools, Business'),
 (880,'Government Managed Health Plans'),
 (882,'Mental Health Programs'),
 (883,'Occupational Medicine or Clinics'),
 (884,'Ground Transportation Companies'),
 (885,'Hotels/Motels Area 1'),
 (886,'Hotels/Motels Area 2'),
 (887,'Hotels/Motels Area 3'),
 (888,'Hotels/Motels Area 4'),
 (889,'Hotles/Motels Area 5'),
 (890,'Government Organization or Entity'),
 (891,'Marketing Companies'),
 (892,'Private Companies, Locally Owned'),
 (893,'Public Companies, Locally Owned'),
 (894,'Family Owned, Locally Based'),
 (895,'Minority Businesses, Locally Owned'),
 (896,'Business Brokers'),
 (897,'Vineyards'),
 (898,'Farming or Farms'),
 (899,'Venture Capital Funded Start-Up Companies'),
 (900,'Patents, Life Sciences'),
 (901,'LEED Professionals'),
 (902,'Funeral Service Providers'),
 (903,'Landscape Architects'),
 (904,'Women Owned Businesses, Locally Owned'),
 (905,'Public Companies, State Based'),
 (906,'Business Parks'),
 (907,'Regional Companies'),
 (908,'Hazardous Waste'),
 (909,'Law Firms, Health Care'),
 (910,'Alternative Energy and Fuels Companies'),
 (911,'Highest Paid Executives, Banks'),
 (912,'Solar Installers'),
 (913,'Colleges & Universities, Retention Rates'),
 (914,'SBA 504 Loans'),
 (915,'SBA 7(a) Loans'),
 (916,'Translation Service Companies'),
 (917,'Technology Companies, Small'),
 (918,'Veterinarians and Veterinary Hospitals'),
 (919,'Schools, Alternative Medical'),
 (920,'Optic Companies'),
 (921,'Risk Management Consultants'),
 (922,'Employers, Healthiest'),
 (923,'Property Tax Consultants'),
 (924,'Orthopedic Practices'),
 (925,'Retail Electricity Providers'),
 (926,'Energy Star Certified Buildings'),
 (927,'Human Resource Executives'),
 (928,'Medical Equipment and Supplies'),
 (930,'Gay/Lesbian/Transgender Owned Businesses'),
 (931,'Bankruptcies'),
 (932,'Disabled-Owned Businesses'),
 (933,'Nonprofit Executive Compensation'),
 (934,'Homes, Most Expensive, Prior Years'),
 (935,'Medical Cannabis Dispensaries'),
 (936,'Law Department, In House Corporate Counsel'),
 (937,'Aviation Contractors'),
 (938,'Nonprofit Organizations, Cultural'),
 (939,'Architectural Firms, Statewide'),
 (940,'Hospitals, Statewide'),
 (941,'Meeting and Convention Places, Statewide'),
 (942,'Women Led Businesses'),
 (943,'International Companies'),
 (944,'Employers, Diversity'),
 (945,'E-Commerce Sites'),
 (946,'Nonprofit Organizations, Specialized Mixture'),
 (947,'Nonprofits, Combined Groups'),
 (948,'Political Donors'),
 (949,'Highest Paid Chief Financial Officers'),
 (950,'Highest Paid Women Executives'),
 (951,'Highest Paid Board of Directors'),
 (952,'Cloud Computing'),
 (953,'LEED Commercial Spaces'),
 (954,'Life Sciences'),
 (955,'Wealth Management'),
 (956,'Leases, Commercial Real Estate'),
 (957,'Commercial Real Estate Sales'),
 (958,'Restaurants, Upscale'),
 (959,'Law Firms, Energy'),
 (960,'Ports'),
 (961,'Maritime Services'),
 (962,'40 Under Forty: Past Winners'),
 (963,'Surgery Centers, Laser'),
 (964,'Surgery Centers, Eye'),
 (965,'Surgery Centers, Laser and Eye'),
 (966,'Marketing, Social Media '),
 (967,'Volunteer Opportunities'),
 (968,'Labor Councils/Regional Organziations'),
 (969,'Nonprofit Organizations, Health Specific'),
 (970,'Nonprofit Organizations, Animal Specific'),
 (971,'Nonprofit Organizations, Education/Entertainment Specific'),
 (972,'Nonprofit Organizations, Environmental Specific'),
 (973,'Nonprofit Organizations, Social Services Specific'),
 (974,'Highest Paid Executives, Nonprofits'),
 (975,'Animal Health Companies'),
 (976,'Oil & Gas Producers '),
 (977,'Highest Paid Hospital Executives'),
 (978,'Restaurant Chains'),
 (979,'Restaurant Chains, State Based'),
 (980,'Insurance, Accident & Health'),
 (981,'Cheesesteak Establishments'),
 (982,'Workforce Development'),
 (983,'Family Owned Businesses, Oldest'),
 (984,'Mobile Applications Developers'),
 (985,'Research Projects Institution No. 1'),
 (986,'Research Projects Institution No. 2'),
 (987,'Landscaping, Other'),
 (988,'Games Developers'),
 (989,'Youth Focused'),
 (990,'Dialysis Centers'),
 (991,'Nursing Schools'),
 (992,'Accounting Firms, Region Specific'),
 (993,'Incubators, Higher Ed Sourced Companies'),
 (994,'Chambers of Commerce, Binational'),
 (995,'Museums'),
 (996,'Intersections, Busiest'),
 (997,'Buildings. Data-center specific'),
 (998,'Stocks, Best Performing'),
 (999,'Stocks, Worst Performing'),
 (1000,'Foundations, Individual'),
 (1001,'Philanthropists, Individual'),
 (1002,'Deal/Discount Group Sites'),
 (1003,'Mortgage Foreclosures'),
 (1004,'Foundations'),
 (1005,'Nominations'),
 (1006,'Foreclosures, Mortgages'),
 (1007,'Best Places to Work: Current Year'),
 (1008,'Money Managers and Financial Planners'),
 (1009,'Insurance Agencies, Independent'),
 (1010,'Office Buildings, Most Leased'),
 (1011,'Nonprofit Organizations, Arts Specific'),
 (1012,'Nonprofit Organizations, Fundraising Specific'),
 (1013,'Nonprofit Organizations, Civic Specific'),
 (1014,'Nonprofit Organizations, Economic Development Specific'),
 (1015,'Nonprofit Organizations, Youth Focused Specific'),
 (1016,'Digital Entertainment Companies'),
 (1017,'Employers, Healthiest: Small'),
 (1018,'Employers, Healthiest: Medium'),
 (1019,'Employers, Healthiest: Large'),
 (1020,'General Contractors, Statewide'),
 (1021,'Security Guard Companies'),
 (1022,'Social Media Followers'),
 (1023,'Web Design and Development'),
 (1024,'Airports, Statewide'),
 (1026,'Ports, Statewide'),
 (1027,'Law Firms, Statewide'),
 (1029,'Colleges and Universities, Statewide'),
 (1030,'Banks, Statewide'),
 (1031,'Advertising Agencies, Statewide'),
 (1032,'Cruise Lines, Statewide'),
 (1033,'Fastest Growing Companies, Statewide'),
 (1034,'Cancer Centers, Statewide'),
 (1035,'Managed Care Plans, Statewide'),
 (1036,'Insurance, Property & Casualty, Statewide'),
 (1037,'Business of the Year Award'),
 (1038,'Cyber Security Companies'),
 (1039,'Flight Schools'),
 (1040,'B Corps.'),
 (1041,'Commercial Real Estate Transactions: 2014'),
 (1042,'Residential Real Estate Transactions: 2014'),
 (1043,'Sport Franchises/Teams'),
 (1044,'Product Design'),
 (1045,'Endowments, College'),
 (1046,'Small Business -Silicon Valley'),
 (1047,'Big Data');


Create table Letter (
Id int(11) unsigned not null auto_increment,
EnvironmentId int(11) unsigned not null,
Name varchar(100) not null,
Body text,
Description text,
DateCreated timestamp default CURRENT_TIMESTAMP,
primary key (Id)
);

CREATE table LetterDefault (
Id int(11) unsigned not null auto_increment,
Name varchar(100) not null,
Body text,
DateCreated timestamp default CURRENT_TIMESTAMP,
primary key (id)
);

CREATE table UserPreference (
UserId int(11) not null,
Signature text,
DetailedCSV varchar(1) default 'N',
DateCreated timestamp default CURRENT_TIMESTAMP,
primary key (UserId)
);

CREATE table ListPage (
ListId int(11) unsigned not null,
Year int(4) unsigned not null,
PubYear varchar(10) not null,
PageNum varchar(7) not null,
StartNum int(4) not null,
EndNum int(4) not null,
DateCreated timestamp default CURRENT_TIMESTAMP,
primary key (ListId, Year, PageNum)
);

ALTER table ListPage add column EnvironmentId int(11) unsigned; 

CREATE table UserListAlert (
Id int(11) unsigned not null auto_increment,
UserId int(11) unsigned not null,
UserName varchar(255) not null,
EnvironmentId int(11) unsigned not null,
ListId int(11) unsigned not null,
ListName varchar(255) not null,
DateCreated timestamp default CURRENT_TIMESTAMP,
primary key (Id)
);

CREATE table BOLIndex (
RecId int(11) unsigned not null,
Year int(4) unsigned not null,
Name varchar(255) not null,
RecType varchar(100) not null,
primary key (RecId, Year)
);

ALTER table BOLIndex add column EnvironmentId int(11) unsigned; 

CREATE Table BOLIndexPage (
RecId int(11) unsigned not null,
Year int(4) unsigned not null,
PageNum varchar(7),
primary key (RecId, Year, PageNum)
);

CREATE Table ListContactDownload (
Id int(11) unsigned not null auto_increment,
ListId int(11) unsigned not null,
TimeframeKey varchar(10) not null,
ListName varchar(250),
Market varchar(250),
DateCreated timestamp default CURRENT_TIMESTAMP,
primary key (Id)
);

CREATE Table ListContactDownloadRow (
ListContactDownloadId int(11) unsigned not null,
RecId int(11) unsigned not null,
Business varchar(250),
Address1 varchar(250),
Address2 varchar(250),
City varchar(250),
State varchar(2),
Zip varchar(20),
Phone varchar(250),
Website varchar(250),
RankNum int(4),
RankField varchar(100),
RankValue double,
Exec1Prefix varchar(250),
Exec1First varchar(250),
Exec1Middle varchar(250),
Exec1Last varchar(250),
Exec1Suffix varchar(250),
Exec1Title varchar(250),
Exec1Email varchar(250),
Exec2Prefix varchar(250),
Exec2First varchar(250),
Exec2Middle varchar(250),
Exec2Last varchar(250),
Exec2Suffix varchar(250),
Exec2Title varchar(250),
Exec2Email varchar(250),
DateCreated timestamp default CURRENT_TIMESTAMP,
primary key (ListContactDownloadId, RecId)
);

DELETE from ListContactDownloadRow;
DELETE from ListContactDownload;
CREATE Table ListContactDownloadPersonRow (
ListContactDownloadId int(11) unsigned not null,
RecId int(11) unsigned not null,
PersonRecId int(11) unsigned not null,
ExecPrefix varchar(250),
ExecFirst varchar(250),
ExecMiddle varchar(250),
ExecLast varchar(250),
ExecSuffix varchar(250),
ExecTitle varchar(250),
ExecEmail varchar(250),
Position smallint unsigned default 0,
DateCreated timestamp default CURRENT_TIMESTAMP,
primary key (ListContactDownloadId, RecId, PersonRecId)
);

CREATE table RealEstateListingSetting (
SettingKey varchar(50) not null,
EnvironmentId int(11) unsigned not null,
SettingValue varchar(255),
DateCreated timestamp default CURRENT_TIMESTAMP,
primary key ( SettingKey, EnvironmentId )
);


INSERT INTO LetterDefault (Name, Body) VALUES
('Invite', 'The newsroom at the @MARKET@ is requesting information for its list of @LIST@.<br />
<br />
The @MARKET@\'s weekly lists, compiled annually in our Book of Lists are recognized throughout the city as reliable and reputable sources of business information.<br />
We hope you will help us update this important reference resource.<br />
Please complete our brief survey no later than @DUEDT@. To begin, click here: @LINK@ .<br />
<br />
<br />
To receive a survey form by fax, please contact me.<br />
There is no fee associated with participation in this survey, publication in The @LIST@ List or inclusion in the Book of Lists. If you have any questions, please contact me.<br />
Thank you for your participation.<br />
Very truly yours,<br />
<br />
@SIGNATURE@<br />
<br />
@MARKET@<br />
To notify us that you do not want to receive e-mail like this in the future, please advise us by replying to this e-mail with the word "Remove" in the subject line.');

INSERT INTO LetterDefault (Name, Body) VALUES
('Reminder', 'Reminder:<br />
I have not yet received your completed survey for the @MARKET@\'s @LIST@ List<br />
<br />
To be considered for the list please complete a brief survey no later than @DUEDT@. To begin, click here: @LINK@.<br />
<br />
To receive a survey form by fax, please contact me.<br />
There is no fee associated with participation in this survey, publication in The @LIST@ List or inclusion in the Book of Lists. If you have any questions, please contact me.<br />
Thank you for your participation.<br />
Very truly yours,<br />
<br />
@SIGNATURE@<br />
<br />
@MARKET@<br />
To notify us that you do not want to receive e-mail like this in the future, please advise us by replying to this e-mail with the word "Remove" in the subject line.');

INSERT INTO LetterDefault (Name, Body) VALUES
('Final Reminder', 'Final Reminder:<br />
I have not yet received your completed survey for the @MARKET@\'s @LIST@ List<br />
<br />
To be considered for the list please complete a brief survey no later than @DUEDT@. To begin, click here: @LINK@.<br />
<br />
To receive a survey form by fax, please contact me.<br />
There is no fee associated with participation in this survey, publication in The @LIST@ List or inclusion in the Book of Lists. If you have any questions, please contact me.<br />
Thank you for your participation.<br />
Very truly yours,<br />
<br />
@SIGNATURE@<br />
<br />
@MARKET@<br />
To notify us that you do not want to receive e-mail like this in the future, please advise us by replying to this e-mail with the word "Remove" in the subject line.');

INSERT INTO LetterDefault (Name, Body) VALUES
('Incomplete Reminder', 'FINAL REMINDER:<br />
I have not yet received your completed survey for the @MARKET@\'s @LIST@ List.<br />
<br />
The newsroom at the @MARKET@ has updated its annual list of @LIST@.<br />
<br />
Unfortunately, your organization\'s data is incomplete or not yet up-to-date for our list, which will be published soon.<br />
<br />
To be considered for the list, please complete a brief survey no later than @DUEDT@. To begin, click here: @LINK@.<br />
<br />
To receive a survey form by fax, please contact me.<br />
There is no fee associated with participation in this survey, publication in The @LIST@ List or inclusion in the Book of Lists. If you have any questions, please contact me.<br />
Thank you for your participation.<br />
Very truly yours,<br />
<br />
@SIGNATURE@<br />
<br />
@MARKET@<br />
To notify us that you do not want to receive e-mail like this in the future, please advise us by replying to this e-mail with the word "Remove" in the subject line.');


Create Table SavedSubmission (
QKey varchar(200) not null,
QData text not null,
DateCreated timestamp default CURRENT_TIMESTAMP,
primary key (QKey)
);

ALTER table SavedSubmission add column QDataBlob BLOB;

*/
