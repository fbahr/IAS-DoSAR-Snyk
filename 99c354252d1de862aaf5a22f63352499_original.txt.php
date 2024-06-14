<?php

class CBXFeatures
{
    private static $_1279882418 = 30;
    private static $_1598537713 = array("Portal" => array("CompanyCalendar", "CompanyPhoto", "CompanyVideo", "CompanyCareer", "StaffChanges", "StaffAbsence", "CommonDocuments", "MeetingRoomBookingSystem", "Wiki", "Learning", "Vote", "WebLink", "Subscribe", "Friends", "PersonalFiles", "PersonalBlog", "PersonalPhoto", "PersonalForum", "Blog", "Forum", "Gallery", "Board", "MicroBlog", "WebMessenger"), "Communications" => array("Tasks", "Calendar", "Workgroups", "Jabber", "VideoConference", "Extranet", "SMTP", "Requests", "DAV", "intranet_sharepoint", "timeman", "Idea", "Meeting", "EventList", "Salary", "XDImport"), "Enterprise" => array("BizProc", "Lists", "Support", "Analytics", "crm", "Controller", "LdapUnlimitedUsers"), "Holding" => array("Cluster", "MultiSites"));
    private static $_838178581 = null;
    private static $_849995802 = null;
    private static function __77600518()
    {
        if (self::$_838178581 === null) {
            self::$_838178581 = array();
            foreach (self::$_1598537713 as $_874674178 => $_1467663947) {
                foreach ($_1467663947 as $_1214927381) {
                    self::$_838178581[$_1214927381] = $_874674178;
                }
            }
        }
        if (self::$_849995802 === null) {
            self::$_849995802 = array();
            $_1174347749 = COption::GetOptionString(___1085327495(2), ___1085327495(3), ___1085327495(4));
            if ($_1174347749 != ___1085327495(5)) {
                $_1174347749 = $GLOBALS['____755773739'][1]($_1174347749);
                $_1174347749 = $GLOBALS['____755773739'][2]($_1174347749, [___1085327495(6) => false]);
                if ($GLOBALS['____755773739'][3]($_1174347749)) {
                    self::$_849995802 = $_1174347749;
                }
            }
            if (empty(self::$_849995802)) {
                self::$_849995802 = array(___1085327495(7) => array(), ___1085327495(8) => array());
            }
        }
    }
    public static function InitiateEditionsSettings($_35816302)
    {
        self::__77600518();
        $_1925431789 = array();
        foreach (self::$_1598537713 as $_874674178 => $_1467663947) {
            $_707446751 = $GLOBALS['____755773739'][4]($_874674178, $_35816302);
            self::$_849995802[___1085327495(9)][$_874674178] = $_707446751 ? array(___1085327495(10)) : array(___1085327495(11));
            foreach ($_1467663947 as $_1214927381) {
                self::$_849995802[___1085327495(12)][$_1214927381] = $_707446751;
                if (!$_707446751) {
                    $_1925431789[] = array($_1214927381, false);
                }
            }
        }
        $_2058829764 = $GLOBALS['____755773739'][5](self::$_849995802);
        $_2058829764 = $GLOBALS['____755773739'][6]($_2058829764);
        COption::SetOptionString(___1085327495(13), ___1085327495(14), $_2058829764);
        foreach ($_1925431789 as $_163711505) {
            self::__1634896363($_163711505[0], $_163711505[round(1)]);
        }
    }
    public static function IsFeatureEnabled($_1214927381)
    {
        if ($_1214927381 == '') {
            return true;
        }
        self::__77600518();
        if (!isset(self::$_838178581[$_1214927381])) {
            return true;
        }
        if (self::$_838178581[$_1214927381] == ___1085327495(15)) {
            $_1077981687 = array(___1085327495(16));
        } elseif (isset(self::$_849995802[___1085327495(17)][self::$_838178581[$_1214927381]])) {
            $_1077981687 = self::$_849995802[___1085327495(18)][self::$_838178581[$_1214927381]];
        } else {
            $_1077981687 = array(___1085327495(19));
        }
        if ($_1077981687[min(6, 0, 2)] != ___1085327495(20) && $_1077981687[min(210, 0, 70)] != ___1085327495(21)) {
            return false;
        } elseif ($_1077981687[min(180, 0, 60)] == ___1085327495(22)) {
            if ($_1077981687[round(1.0)] < $GLOBALS['____755773739'][7](0, 0, min(138, 0, 46), Date(___1085327495(23)), $GLOBALS['____755773739'][8](___1085327495(24)) - self::$_1279882418, $GLOBALS['____755773739'][9](___1085327495(25)))) {
                if (!isset($_1077981687[round(2.0)]) || !$_1077981687[round(2.0000000000000098)]) {
                    self::__1125005211(self::$_838178581[$_1214927381]);
                }
                return false;
            }
        }
        return !isset(self::$_849995802[___1085327495(26)][$_1214927381]) || self::$_849995802[___1085327495(27)][$_1214927381];
    }
    public static function IsFeatureInstalled($_1214927381)
    {
        if ($GLOBALS['____755773739'][10]($_1214927381) <= 0) {
            return true;
        }
        self::__77600518();
        return isset(self::$_849995802[___1085327495(28)][$_1214927381]) && self::$_849995802[___1085327495(29)][$_1214927381];
    }
    public static function IsFeatureEditable($_1214927381)
    {
        if ($_1214927381 == '') {
            return true;
        }
        self::__77600518();
        if (!isset(self::$_838178581[$_1214927381])) {
            return true;
        }
        if (self::$_838178581[$_1214927381] == ___1085327495(30)) {
            $_1077981687 = array(___1085327495(31));
        } elseif (isset(self::$_849995802[___1085327495(32)][self::$_838178581[$_1214927381]])) {
            $_1077981687 = self::$_849995802[___1085327495(33)][self::$_838178581[$_1214927381]];
        } else {
            $_1077981687 = array(___1085327495(34));
        }
        if ($_1077981687[min(212, 0, 70.666666666667)] != ___1085327495(35) && $_1077981687[min(206, 0, 68.666666666667)] != ___1085327495(36)) {
            return false;
        } elseif ($_1077981687[min(76, 0, 25.333333333333)] == ___1085327495(37)) {
            if ($_1077981687[round(0.99999999999999)] < $GLOBALS['____755773739'][11](0, 0, min(66, 0, 22), Date(___1085327495(38)), $GLOBALS['____755773739'][12](___1085327495(39)) - self::$_1279882418, $GLOBALS['____755773739'][13](___1085327495(40)))) {
                if (!isset($_1077981687[round(2.0)]) || !$_1077981687[round(2)]) {
                    self::__1125005211(self::$_838178581[$_1214927381]);
                }
                return false;
            }
        }
        return true;
    }
    private static function __1634896363($_1214927381, $_858810052)
    {
        if ($GLOBALS['____755773739'][14]("CBXFeatures", "On" . $_1214927381 . "SettingsChange")) {
            $GLOBALS['____755773739'][15](array("CBXFeatures", "On" . $_1214927381 . "SettingsChange"), array($_1214927381, $_858810052));
        }
        $_707770267 = $GLOBALS['_____1246712593'][0](___1085327495(41), ___1085327495(42) . $_1214927381 . ___1085327495(43));
        while ($_1680394947 = $_707770267->Fetch()) {
            $GLOBALS['_____1246712593'][1]($_1680394947, array($_1214927381, $_858810052));
        }
    }
    public static function SetFeatureEnabled($_1214927381, $_858810052 = true, $_1097806457 = true)
    {
        if ($GLOBALS['____755773739'][16]($_1214927381) <= 0) {
            return;
        }
        if (!self::IsFeatureEditable($_1214927381)) {
            $_858810052 = false;
        }
        $_858810052 = (bool) $_858810052;
        self::__77600518();
        $_636697313 = !isset(self::$_849995802[___1085327495(44)][$_1214927381]) && $_858810052 || isset(self::$_849995802[___1085327495(45)][$_1214927381]) && $_858810052 != self::$_849995802[___1085327495(46)][$_1214927381];
        self::$_849995802[___1085327495(47)][$_1214927381] = $_858810052;
        $_2058829764 = $GLOBALS['____755773739'][17](self::$_849995802);
        $_2058829764 = $GLOBALS['____755773739'][18]($_2058829764);
        COption::SetOptionString(___1085327495(48), ___1085327495(49), $_2058829764);
        if ($_636697313 && $_1097806457) {
            self::__1634896363($_1214927381, $_858810052);
        }
    }
    private static function __1125005211($_874674178)
    {
        if ($GLOBALS['____755773739'][19]($_874674178) <= 0 || $_874674178 == "Portal") {
            return;
        }
        self::__77600518();
        if (!isset(self::$_849995802[___1085327495(50)][$_874674178]) || self::$_849995802[___1085327495(51)][$_874674178][0] != ___1085327495(52)) {
            return;
        }
        if (isset(self::$_849995802[___1085327495(53)][$_874674178][round(2.0)]) && self::$_849995802[___1085327495(54)][$_874674178][round(2.0)]) {
            return;
        }
        $_1925431789 = array();
        if (isset(self::$_1598537713[$_874674178]) && $GLOBALS['____755773739'][20](self::$_1598537713[$_874674178])) {
            foreach (self::$_1598537713[$_874674178] as $_1214927381) {
                if (isset(self::$_849995802[___1085327495(55)][$_1214927381]) && self::$_849995802[___1085327495(56)][$_1214927381]) {
                    self::$_849995802[___1085327495(57)][$_1214927381] = false;
                    $_1925431789[] = array($_1214927381, false);
                }
            }
            self::$_849995802[___1085327495(58)][$_874674178][round(2.0)] = true;
        }
        $_2058829764 = $GLOBALS['____755773739'][21](self::$_849995802);
        $_2058829764 = $GLOBALS['____755773739'][22]($_2058829764);
        COption::SetOptionString(___1085327495(59), ___1085327495(60), $_2058829764);
        foreach ($_1925431789 as $_163711505) {
            self::__1634896363($_163711505[min(80, 0, 26.666666666667)], $_163711505[round(1.0)]);
        }
    }
    public static function ModifyFeaturesSettings($_35816302, $_1467663947)
    {
        self::__77600518();
        foreach ($_35816302 as $_874674178 => $_1982187990) {
            self::$_849995802[___1085327495(61)][$_874674178] = $_1982187990;
        }
        $_1925431789 = array();
        foreach ($_1467663947 as $_1214927381 => $_858810052) {
            if (!isset(self::$_849995802[___1085327495(62)][$_1214927381]) && $_858810052 || isset(self::$_849995802[___1085327495(63)][$_1214927381]) && $_858810052 != self::$_849995802[___1085327495(64)][$_1214927381]) {
                $_1925431789[] = array($_1214927381, $_858810052);
            }
            self::$_849995802[___1085327495(65)][$_1214927381] = $_858810052;
        }
        $_2058829764 = $GLOBALS['____755773739'][23](self::$_849995802);
        $_2058829764 = $GLOBALS['____755773739'][24]($_2058829764);
        COption::SetOptionString(___1085327495(66), ___1085327495(67), $_2058829764);
        self::$_849995802 = false;
        foreach ($_1925431789 as $_163711505) {
            self::__1634896363($_163711505[0], $_163711505[round(1.0)]);
        }
    }
    public static function SaveFeaturesSettings($_1278146999, $_528505561)
    {
        self::__77600518();
        $_505681141 = array(___1085327495(68) => array(), ___1085327495(69) => array());
        if (!$GLOBALS['____755773739'][25]($_1278146999)) {
            $_1278146999 = array();
        }
        if (!$GLOBALS['____755773739'][26]($_528505561)) {
            $_528505561 = array();
        }
        if (!$GLOBALS['____755773739'][27](___1085327495(70), $_1278146999)) {
            $_1278146999[] = ___1085327495(71);
        }
        foreach (self::$_1598537713 as $_874674178 => $_1467663947) {
            if (isset(self::$_849995802[___1085327495(72)][$_874674178])) {
                $_1995874853 = self::$_849995802[___1085327495(73)][$_874674178];
            } else {
                $_1995874853 = $_874674178 == ___1085327495(74) ? array(___1085327495(75)) : array(___1085327495(76));
            }
            if ($_1995874853[0] == ___1085327495(77) || $_1995874853[min(162, 0, 54)] == ___1085327495(78)) {
                $_505681141[___1085327495(79)][$_874674178] = $_1995874853;
            } else {
                if ($GLOBALS['____755773739'][28]($_874674178, $_1278146999)) {
                    $_505681141[___1085327495(80)][$_874674178] = array(___1085327495(81), $GLOBALS['____755773739'][29](0, 0, 0, $GLOBALS['____755773739'][30](___1085327495(82)), $GLOBALS['____755773739'][31](___1085327495(83)), $GLOBALS['____755773739'][32](___1085327495(84))));
                } else {
                    $_505681141[___1085327495(85)][$_874674178] = array(___1085327495(86));
                }
            }
        }
        $_1925431789 = array();
        foreach (self::$_838178581 as $_1214927381 => $_874674178) {
            if ($_505681141[___1085327495(87)][$_874674178][0] != ___1085327495(88) && $_505681141[___1085327495(89)][$_874674178][0] != ___1085327495(90)) {
                $_505681141[___1085327495(91)][$_1214927381] = false;
            } else {
                if ($_505681141[___1085327495(92)][$_874674178][0] == ___1085327495(93) && $_505681141[___1085327495(94)][$_874674178][round(1)] < $GLOBALS['____755773739'][33](0, min(28, 0, 9.3333333333333), 0, Date(___1085327495(95)), $GLOBALS['____755773739'][34](___1085327495(96)) - self::$_1279882418, $GLOBALS['____755773739'][35](___1085327495(97)))) {
                    $_505681141[___1085327495(98)][$_1214927381] = false;
                } else {
                    $_505681141[___1085327495(99)][$_1214927381] = $GLOBALS['____755773739'][36]($_1214927381, $_528505561);
                }
                if (!isset(self::$_849995802[___1085327495(100)][$_1214927381]) && $_505681141[___1085327495(101)][$_1214927381] || isset(self::$_849995802[___1085327495(102)][$_1214927381]) && $_505681141[___1085327495(103)][$_1214927381] != self::$_849995802[___1085327495(104)][$_1214927381]) {
                    $_1925431789[] = array($_1214927381, $_505681141[___1085327495(105)][$_1214927381]);
                }
            }
        }
        $_2058829764 = $GLOBALS['____755773739'][37]($_505681141);
        $_2058829764 = $GLOBALS['____755773739'][38]($_2058829764);
        COption::SetOptionString(___1085327495(106), ___1085327495(107), $_2058829764);
        self::$_849995802 = false;
        foreach ($_1925431789 as $_163711505) {
            self::__1634896363($_163711505[min(114, 0, 38)], $_163711505[round(1.0)]);
        }
    }
    public static function GetFeaturesList()
    {
        self::__77600518();
        $_1785265180 = array();
        foreach (self::$_1598537713 as $_874674178 => $_1467663947) {
            if (isset(self::$_849995802[___1085327495(108)][$_874674178])) {
                $_1995874853 = self::$_849995802[___1085327495(109)][$_874674178];
            } else {
                $_1995874853 = $_874674178 == ___1085327495(110) ? array(___1085327495(111)) : array(___1085327495(112));
            }
            $_1785265180[$_874674178] = array(___1085327495(113) => $_1995874853[0], ___1085327495(114) => $_1995874853[round(1.0)], ___1085327495(115) => array());
            $_1785265180[$_874674178][___1085327495(116)] = false;
            if ($_1785265180[$_874674178][___1085327495(117)] == ___1085327495(118)) {
                $_1785265180[$_874674178][___1085327495(119)] = $GLOBALS['____755773739'][39](($GLOBALS['____755773739'][40]() - $_1785265180[$_874674178][___1085327495(120)]) / round(86400));
                if ($_1785265180[$_874674178][___1085327495(121)] > self::$_1279882418) {
                    $_1785265180[$_874674178][___1085327495(122)] = true;
                }
            }
            foreach ($_1467663947 as $_1214927381) {
                $_1785265180[$_874674178][___1085327495(123)][$_1214927381] = !isset(self::$_849995802[___1085327495(124)][$_1214927381]) || self::$_849995802[___1085327495(125)][$_1214927381];
            }
        }
        return $_1785265180;
    }
    private static function __110580837($_114500850, $_838143783)
    {
        if (IsModuleInstalled($_114500850) == $_838143783) {
            return true;
        }
        $_855616594 = $_SERVER[___1085327495(126)] . ___1085327495(127) . $_114500850 . ___1085327495(128);
        if (!$GLOBALS['____755773739'][41]($_855616594)) {
            return false;
        }
        include_once $_855616594;
        $_85057319 = $GLOBALS['____755773739'][42](___1085327495(129), ___1085327495(130), $_114500850);
        if (!$GLOBALS['____755773739'][43]($_85057319)) {
            return false;
        }
        $_2025334276 = new $_85057319();
        if ($_838143783) {
            if (!$_2025334276->InstallDB()) {
                return false;
            }
            $_2025334276->InstallEvents();
            if (!$_2025334276->InstallFiles()) {
                return false;
            }
        } else {
            if (CModule::IncludeModule(___1085327495(131))) {
                CSearch::DeleteIndex($_114500850);
            }
            UnRegisterModule($_114500850);
        }
        return true;
    }
    protected static function OnRequestsSettingsChange($_1214927381, $_858810052)
    {
        self::__110580837("form", $_858810052);
    }
    protected static function OnLearningSettingsChange($_1214927381, $_858810052)
    {
        self::__110580837("learning", $_858810052);
    }
    protected static function OnJabberSettingsChange($_1214927381, $_858810052)
    {
        self::__110580837("xmpp", $_858810052);
    }
    protected static function OnVideoConferenceSettingsChange($_1214927381, $_858810052)
    {
        self::__110580837("video", $_858810052);
    }
    protected static function OnBizProcSettingsChange($_1214927381, $_858810052)
    {
        self::__110580837("bizprocdesigner", $_858810052);
    }
    protected static function OnListsSettingsChange($_1214927381, $_858810052)
    {
        self::__110580837("lists", $_858810052);
    }
    protected static function OnWikiSettingsChange($_1214927381, $_858810052)
    {
        self::__110580837("wiki", $_858810052);
    }
    protected static function OnSupportSettingsChange($_1214927381, $_858810052)
    {
        self::__110580837("support", $_858810052);
    }
    protected static function OnControllerSettingsChange($_1214927381, $_858810052)
    {
        self::__110580837("controller", $_858810052);
    }
    protected static function OnAnalyticsSettingsChange($_1214927381, $_858810052)
    {
        self::__110580837("statistic", $_858810052);
    }
    protected static function OnVoteSettingsChange($_1214927381, $_858810052)
    {
        self::__110580837("vote", $_858810052);
    }
    protected static function OnFriendsSettingsChange($_1214927381, $_858810052)
    {
        if ($_858810052) {
            $_849688340 = "Y";
        } else {
            $_849688340 = ___1085327495(132);
        }
        $_1139690504 = CSite::GetList(___1085327495(133), ___1085327495(134), array(___1085327495(135) => ___1085327495(136)));
        while ($_1824903020 = $_1139690504->Fetch()) {
            if (COption::GetOptionString(___1085327495(137), ___1085327495(138), ___1085327495(139), $_1824903020[___1085327495(140)]) != $_849688340) {
                COption::SetOptionString(___1085327495(141), ___1085327495(142), $_849688340, false, $_1824903020[___1085327495(143)]);
                COption::SetOptionString(___1085327495(144), ___1085327495(145), $_849688340);
            }
        }
    }
    protected static function OnMicroBlogSettingsChange($_1214927381, $_858810052)
    {
        if ($_858810052) {
            $_849688340 = "Y";
        } else {
            $_849688340 = ___1085327495(146);
        }
        $_1139690504 = CSite::GetList(___1085327495(147), ___1085327495(148), array(___1085327495(149) => ___1085327495(150)));
        while ($_1824903020 = $_1139690504->Fetch()) {
            if (COption::GetOptionString(___1085327495(151), ___1085327495(152), ___1085327495(153), $_1824903020[___1085327495(154)]) != $_849688340) {
                COption::SetOptionString(___1085327495(155), ___1085327495(156), $_849688340, false, $_1824903020[___1085327495(157)]);
                COption::SetOptionString(___1085327495(158), ___1085327495(159), $_849688340);
            }
            if (COption::GetOptionString(___1085327495(160), ___1085327495(161), ___1085327495(162), $_1824903020[___1085327495(163)]) != $_849688340) {
                COption::SetOptionString(___1085327495(164), ___1085327495(165), $_849688340, false, $_1824903020[___1085327495(166)]);
                COption::SetOptionString(___1085327495(167), ___1085327495(168), $_849688340);
            }
        }
    }
    protected static function OnPersonalFilesSettingsChange($_1214927381, $_858810052)
    {
        if ($_858810052) {
            $_849688340 = "Y";
        } else {
            $_849688340 = ___1085327495(169);
        }
        $_1139690504 = CSite::GetList(___1085327495(170), ___1085327495(171), array(___1085327495(172) => ___1085327495(173)));
        while ($_1824903020 = $_1139690504->Fetch()) {
            if (COption::GetOptionString(___1085327495(174), ___1085327495(175), ___1085327495(176), $_1824903020[___1085327495(177)]) != $_849688340) {
                COption::SetOptionString(___1085327495(178), ___1085327495(179), $_849688340, false, $_1824903020[___1085327495(180)]);
                COption::SetOptionString(___1085327495(181), ___1085327495(182), $_849688340);
            }
        }
    }
    protected static function OnPersonalBlogSettingsChange($_1214927381, $_858810052)
    {
        if ($_858810052) {
            $_849688340 = "Y";
        } else {
            $_849688340 = ___1085327495(183);
        }
        $_1139690504 = CSite::GetList(___1085327495(184), ___1085327495(185), array(___1085327495(186) => ___1085327495(187)));
        while ($_1824903020 = $_1139690504->Fetch()) {
            if (COption::GetOptionString(___1085327495(188), ___1085327495(189), ___1085327495(190), $_1824903020[___1085327495(191)]) != $_849688340) {
                COption::SetOptionString(___1085327495(192), ___1085327495(193), $_849688340, false, $_1824903020[___1085327495(194)]);
                COption::SetOptionString(___1085327495(195), ___1085327495(196), $_849688340);
            }
        }
    }
    protected static function OnPersonalPhotoSettingsChange($_1214927381, $_858810052)
    {
        if ($_858810052) {
            $_849688340 = "Y";
        } else {
            $_849688340 = ___1085327495(197);
        }
        $_1139690504 = CSite::GetList(___1085327495(198), ___1085327495(199), array(___1085327495(200) => ___1085327495(201)));
        while ($_1824903020 = $_1139690504->Fetch()) {
            if (COption::GetOptionString(___1085327495(202), ___1085327495(203), ___1085327495(204), $_1824903020[___1085327495(205)]) != $_849688340) {
                COption::SetOptionString(___1085327495(206), ___1085327495(207), $_849688340, false, $_1824903020[___1085327495(208)]);
                COption::SetOptionString(___1085327495(209), ___1085327495(210), $_849688340);
            }
        }
    }
    protected static function OnPersonalForumSettingsChange($_1214927381, $_858810052)
    {
        if ($_858810052) {
            $_849688340 = "Y";
        } else {
            $_849688340 = ___1085327495(211);
        }
        $_1139690504 = CSite::GetList(___1085327495(212), ___1085327495(213), array(___1085327495(214) => ___1085327495(215)));
        while ($_1824903020 = $_1139690504->Fetch()) {
            if (COption::GetOptionString(___1085327495(216), ___1085327495(217), ___1085327495(218), $_1824903020[___1085327495(219)]) != $_849688340) {
                COption::SetOptionString(___1085327495(220), ___1085327495(221), $_849688340, false, $_1824903020[___1085327495(222)]);
                COption::SetOptionString(___1085327495(223), ___1085327495(224), $_849688340);
            }
        }
    }
    protected static function OnTasksSettingsChange($_1214927381, $_858810052)
    {
        if ($_858810052) {
            $_849688340 = "Y";
        } else {
            $_849688340 = ___1085327495(225);
        }
        $_1139690504 = CSite::GetList(___1085327495(226), ___1085327495(227), array(___1085327495(228) => ___1085327495(229)));
        while ($_1824903020 = $_1139690504->Fetch()) {
            if (COption::GetOptionString(___1085327495(230), ___1085327495(231), ___1085327495(232), $_1824903020[___1085327495(233)]) != $_849688340) {
                COption::SetOptionString(___1085327495(234), ___1085327495(235), $_849688340, false, $_1824903020[___1085327495(236)]);
                COption::SetOptionString(___1085327495(237), ___1085327495(238), $_849688340);
            }
            if (COption::GetOptionString(___1085327495(239), ___1085327495(240), ___1085327495(241), $_1824903020[___1085327495(242)]) != $_849688340) {
                COption::SetOptionString(___1085327495(243), ___1085327495(244), $_849688340, false, $_1824903020[___1085327495(245)]);
                COption::SetOptionString(___1085327495(246), ___1085327495(247), $_849688340);
            }
        }
        self::__110580837(___1085327495(248), $_858810052);
    }
    protected static function OnCalendarSettingsChange($_1214927381, $_858810052)
    {
        if ($_858810052) {
            $_849688340 = "Y";
        } else {
            $_849688340 = ___1085327495(249);
        }
        $_1139690504 = CSite::GetList(___1085327495(250), ___1085327495(251), array(___1085327495(252) => ___1085327495(253)));
        while ($_1824903020 = $_1139690504->Fetch()) {
            if (COption::GetOptionString(___1085327495(254), ___1085327495(255), ___1085327495(256), $_1824903020[___1085327495(257)]) != $_849688340) {
                COption::SetOptionString(___1085327495(258), ___1085327495(259), $_849688340, false, $_1824903020[___1085327495(260)]);
                COption::SetOptionString(___1085327495(261), ___1085327495(262), $_849688340);
            }
            if (COption::GetOptionString(___1085327495(263), ___1085327495(264), ___1085327495(265), $_1824903020[___1085327495(266)]) != $_849688340) {
                COption::SetOptionString(___1085327495(267), ___1085327495(268), $_849688340, false, $_1824903020[___1085327495(269)]);
                COption::SetOptionString(___1085327495(270), ___1085327495(271), $_849688340);
            }
        }
    }
    protected static function OnSMTPSettingsChange($_1214927381, $_858810052)
    {
        self::__110580837("mail", $_858810052);
    }
    protected static function OnExtranetSettingsChange($_1214927381, $_858810052)
    {
        $_1677038994 = COption::GetOptionString("extranet", "extranet_site", "");
        if ($_1677038994) {
            $_747532745 = new CSite();
            $_747532745->Update($_1677038994, array(___1085327495(272) => $_858810052 ? ___1085327495(273) : ___1085327495(274)));
        }
        self::__110580837(___1085327495(275), $_858810052);
    }
    protected static function OnDAVSettingsChange($_1214927381, $_858810052)
    {
        self::__110580837("dav", $_858810052);
    }
    protected static function OntimemanSettingsChange($_1214927381, $_858810052)
    {
        self::__110580837("timeman", $_858810052);
    }
    protected static function Onintranet_sharepointSettingsChange($_1214927381, $_858810052)
    {
        if ($_858810052) {
            RegisterModuleDependences("iblock", "OnAfterIBlockElementAdd", "intranet", "CIntranetEventHandlers", "SPRegisterUpdatedItem");
            RegisterModuleDependences(___1085327495(276), ___1085327495(277), ___1085327495(278), ___1085327495(279), ___1085327495(280));
            CAgent::AddAgent(___1085327495(281), ___1085327495(282), ___1085327495(283), round(500));
            CAgent::AddAgent(___1085327495(284), ___1085327495(285), ___1085327495(286), round(300));
            CAgent::AddAgent(___1085327495(287), ___1085327495(288), ___1085327495(289), round(3600));
        } else {
            UnRegisterModuleDependences(___1085327495(290), ___1085327495(291), ___1085327495(292), ___1085327495(293), ___1085327495(294));
            UnRegisterModuleDependences(___1085327495(295), ___1085327495(296), ___1085327495(297), ___1085327495(298), ___1085327495(299));
            CAgent::RemoveAgent(___1085327495(300), ___1085327495(301));
            CAgent::RemoveAgent(___1085327495(302), ___1085327495(303));
            CAgent::RemoveAgent(___1085327495(304), ___1085327495(305));
        }
    }
    protected static function OncrmSettingsChange($_1214927381, $_858810052)
    {
        if ($_858810052) {
            COption::SetOptionString("crm", "form_features", "Y");
        }
        self::__110580837(___1085327495(306), $_858810052);
    }
    protected static function OnClusterSettingsChange($_1214927381, $_858810052)
    {
        self::__110580837("cluster", $_858810052);
    }
    protected static function OnMultiSitesSettingsChange($_1214927381, $_858810052)
    {
        if ($_858810052) {
            RegisterModuleDependences("main", "OnBeforeProlog", "main", "CWizardSolPanelIntranet", "ShowPanel", 100, "/modules/intranet/panel_button.php");
        } else {
            UnRegisterModuleDependences(___1085327495(307), ___1085327495(308), ___1085327495(309), ___1085327495(310), ___1085327495(311), ___1085327495(312));
        }
    }
    protected static function OnIdeaSettingsChange($_1214927381, $_858810052)
    {
        self::__110580837("idea", $_858810052);
    }
    protected static function OnMeetingSettingsChange($_1214927381, $_858810052)
    {
        self::__110580837("meeting", $_858810052);
    }
    protected static function OnXDImportSettingsChange($_1214927381, $_858810052)
    {
        self::__110580837("xdimport", $_858810052);
    }
}
 ?>