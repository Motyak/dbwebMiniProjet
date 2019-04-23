-- Converted by db_converter
START TRANSACTION;
SET standard_conforming_strings=off;
SET escape_string_warning=off;
SET CONSTRAINTS ALL DEFERRED;

CREATE TABLE "categories" (
    "id" integer NOT NULL,
    "nom" text NOT NULL,
    PRIMARY KEY ("id")
);

INSERT INTO "categories" VALUES (1,'Rayon frais'),(2,'Conserves'),(3,'Bricolage'),(4,'Jardin'),(5,'Electroménager');
CREATE TABLE "produits" (
    "id" integer NOT NULL,
    "nom" text NOT NULL,
    "prix" decimal(10,2) NOT NULL,
    "categorie_id" integer NOT NULL,
    PRIMARY KEY ("id")
);

INSERT INTO "produits" VALUES (1,'Pâtes fraîches',3.24,1),(2,'Jambon 4 tranches',4.50,1),(3,'Yaourt chocolat',5.32,1),(4,'Ravioli',2.12,2),(5,'Petits pois',3.50,2),(6,'Ratatouille',2.33,2),(7,'Perçeuse',25.99,3),(8,'Tournevis',5.50,3),(9,'Râteau',12.50,4),(10,'Grille pain',23.50,5),(11,'Gros jambon de bayonne',15.95,1),(12,'Machine à café',89.59,5);
CREATE TABLE "ticket_entry" (
    "id" integer NOT NULL,
    "ticket_id" integer NOT NULL,
    "produit_id" integer NOT NULL,
    "quantite" integer NOT NULL,
    PRIMARY KEY ("id")
);

INSERT INTO "ticket_entry" VALUES (13306,3985,2,2),(13307,3985,5,1),(13308,3985,11,1),(13309,3985,8,2),(13310,3986,12,2),(13311,3986,8,2),(13312,3986,4,1),(13313,3987,7,2),(13314,3987,12,2),(13315,3987,8,1),(13316,3987,11,2),(13317,3987,5,1),(13318,3987,10,2),(13319,3988,3,1),(13320,3988,10,1),(13321,3988,6,1),(13322,3988,9,1),(13323,3988,5,1),(13324,3988,8,1),(13325,3989,4,4),(13326,3989,11,1),(13327,3989,6,1),(13328,3989,12,1),(13329,3989,1,1),(13330,3990,12,1),(13331,3990,1,2),(13332,3990,6,2),(13333,3990,8,1),(13334,3990,7,1),(13335,3991,7,1),(13336,3991,1,1),(13337,3991,11,1),(13338,3992,5,2),(13339,3992,12,1),(13340,3992,9,1),(13341,3993,10,1),(13342,3993,9,1),(13343,3993,2,1),(13344,3994,11,1),(13345,3994,7,1),(13346,3994,2,1),(13347,3994,1,1),(13348,3994,9,1),(13349,3994,3,1),(13350,3995,12,2),(13351,3995,4,1),(13352,3995,11,1),(13353,3995,8,1),(13354,3996,12,1),(13355,3996,8,1),(13356,3996,4,1),(13357,3996,11,1),(13358,3996,6,1),(13359,3996,5,1),(13360,3997,9,1),(13361,3997,2,1),(13362,3998,4,1),(13363,3998,5,1),(13364,3998,10,1),(13365,3998,6,1),(13366,3999,11,2),(13367,3999,4,3),(13368,3999,1,1),(13369,3999,2,1),(13370,4000,6,1),(13371,4000,4,1),(13372,4001,4,1),(13373,4001,11,1),(13374,4002,10,1),(13375,4002,7,1),(13376,4002,11,1),(13377,4002,1,2),(13378,4002,9,2),(13379,4003,9,1),(13380,4003,4,1),(13381,4004,5,2),(13382,4004,7,3),(13383,4004,1,1),(13384,4004,3,1),(13385,4004,2,1),(13386,4005,11,2),(13387,4005,3,1),(13388,4005,6,2),(13389,4005,8,2),(13390,4005,9,1),(13391,4005,4,1),(13392,4006,10,1),(13393,4006,3,1),(13394,4006,1,2),(13395,4006,11,1),(13396,4007,7,1),(13397,4007,6,1),(13398,4008,4,1),(13399,4008,2,1),(13400,4008,5,1),(13401,4008,10,2),(13402,4008,6,1),(13403,4009,5,2),(13404,4009,7,2),(13405,4009,12,1),(13406,4009,9,1),(13407,4009,4,1),(13408,4010,10,1),(13409,4010,6,1),(13410,4010,4,1),(13411,4011,7,2),(13412,4011,4,1),(13413,4011,11,1),(13414,4011,1,2),(13415,4011,12,1),(13416,4011,5,1),(13417,4012,2,2),(13418,4012,6,1),(13419,4012,11,1),(13420,4012,1,1),(13421,4012,9,1),(13422,4013,9,2),(13423,4013,1,1),(13424,4013,2,1),(13425,4013,10,2),(13426,4013,3,1),(13427,4013,7,1),(13428,4014,3,1),(13429,4014,8,1),(13430,4014,5,2),(13431,4014,1,1),(13432,4014,6,1),(13433,4015,6,1),(13434,4015,3,1),(13435,4015,7,1),(13436,4016,7,3),(13437,4016,10,1),(13438,4016,6,1),(13439,4016,9,1),(13440,4016,4,1),(13441,4017,6,2),(13442,4017,4,1),(13443,4017,10,1),(13444,4017,1,1),(13445,4018,2,1),(13446,4018,3,1),(13447,4018,11,1),(13448,4018,1,1),(13449,4019,11,3),(13450,4019,6,2),(13451,4019,3,1),(13452,4019,4,1),(13453,4020,6,2),(13454,4020,1,1),(13455,4020,11,1),(13456,4020,2,1),(13457,4020,9,1),(13458,4021,9,1),(13459,4021,8,1),(13460,4022,11,1),(13461,4022,8,1),(13462,4022,6,1),(13463,4022,3,1),(13464,4022,9,1),(13465,4023,7,1),(13466,4023,4,1),(13467,4023,10,1),(13468,4024,4,1),(13469,4024,9,1),(13470,4024,7,1),(13471,4024,3,1),(13472,4024,11,1),(13473,4024,10,1),(13474,4025,8,1),(13475,4025,5,1),(13476,4025,11,1),(13477,4026,12,1),(13478,4026,9,1),(13479,4027,5,1),(13480,4027,11,1),(13481,4027,1,2),(13482,4027,3,1),(13483,4027,10,1),(13484,4027,6,1),(13485,4027,7,1),(13486,4028,11,1),(13487,4028,12,1),(13488,4028,3,2),(13489,4028,2,1),(13490,4029,2,1),(13491,4029,4,1),(13492,4029,7,1),(13493,4030,7,2),(13494,4030,9,2),(13495,4030,4,1),(13496,4030,8,1),(13497,4030,12,1),(13498,4031,10,1),(13499,4031,11,1),(13500,4031,12,1),(13501,4031,6,1),(13502,4031,9,1),(13503,4032,9,1),(13504,4032,6,1),(13505,4032,10,1),(13506,4033,9,1),(13507,4033,4,1),(13508,4033,10,1),(13509,4034,5,1),(13510,4034,10,1),(13511,4034,2,1),(13512,4034,4,1),(13513,4035,7,2),(13514,4035,11,1),(13515,4035,5,2),(13516,4036,1,1),(13517,4037,3,1),(13518,4037,8,1),(13519,4037,1,2),(13520,4037,9,1),(13521,4037,6,1),(13522,4038,4,2),(13523,4038,1,1),(13524,4038,3,1),(13525,4038,12,1),(13526,4038,6,1),(13527,4039,10,1),(13528,4039,11,1),(13529,4039,12,3),(13530,4040,1,1),(13531,4040,5,1),(13532,4040,3,1),(13533,4040,4,1),(13534,4041,10,1),(13535,4041,12,1),(13536,4041,2,2),(13537,4042,8,2),(13538,4042,6,3),(13539,4042,1,1),(13540,4042,10,1),(13541,4042,4,1),(13542,4042,7,1),(13543,4043,1,1),(13544,4043,9,1),(13545,4044,2,1),(13546,4045,6,1),(13547,4045,3,2),(13548,4045,2,1),(13549,4045,12,1),(13550,4045,7,1),(13551,4046,9,1),(13552,4046,11,2),(13553,4046,6,1),(13554,4046,4,3),(13555,4046,5,1),(13556,4046,7,1),(13557,4046,1,1),(13558,4046,8,1),(13559,4046,2,1),(13560,4047,7,1),(13561,4047,4,1),(13562,4047,2,1),(13563,4047,9,1),(13564,4048,8,2),(13565,4048,9,1),(13566,4048,12,1),(13567,4048,11,2),(13568,4048,6,1),(13569,4048,2,1),(13570,4049,12,3),(13571,4049,10,2),(13572,4049,2,1),(13573,4049,3,1),(13574,4049,1,2),(13575,4049,5,1),(13576,4050,7,1),(13577,4050,3,1),(13578,4050,10,2),(13579,4050,12,3),(13580,4050,6,1),(13581,4050,9,1),(13582,4051,4,1),(13583,4051,2,1),(13584,4051,10,1),(13585,4051,9,1),(13586,4052,6,2),(13587,4052,12,2),(13588,4052,2,1),(13589,4053,7,1),(13590,4053,8,1),(13591,4053,5,1),(13592,4053,12,1),(13593,4053,1,1),(13594,4054,8,1),(13595,4055,9,1),(13596,4055,7,1),(13597,4055,5,1),(13598,4056,1,1),(13599,4056,4,2),(13600,4056,10,1),(13601,4056,6,1),(13602,4056,5,2),(13603,4057,9,1),(13604,4057,11,1),(13605,4057,4,1),(13606,4057,2,2),(13607,4057,6,1),(13608,4057,1,1),(13609,4058,6,2),(13610,4058,4,2),(13611,4058,12,1),(13612,4059,7,1),(13613,4060,10,2),(13614,4061,3,1),(13615,4061,12,2),(13616,4061,9,1),(13617,4062,9,1),(13618,4063,8,1),(13619,4063,4,1),(13620,4064,12,1),(13621,4064,11,1),(13622,4064,10,1),(13623,4065,11,1),(13624,4065,5,1),(13625,4065,4,1),(13626,4065,2,1),(13627,4066,1,1),(13628,4066,4,1),(13629,4066,9,1),(13630,4066,7,1),(13631,4067,5,1),(13632,4067,2,1),(13633,4067,3,1),(13634,4068,5,2),(13635,4068,7,1),(13636,4068,3,1),(13637,4068,11,1),(13638,4068,9,1),(13639,4069,9,1),(13640,4069,7,1),(13641,4069,4,1),(13642,4069,5,1),(13643,4070,12,1),(13644,4070,7,1),(13645,4070,6,1),(13646,4071,9,1),(13647,4071,5,1),(13648,4071,7,1),(13649,4071,11,1),(13650,4071,8,1),(13651,4071,6,1),(13652,4072,3,1),(13653,4072,9,1),(13654,4073,2,1),(13655,4073,7,1),(13656,4073,10,1),(13657,4073,3,1),(13658,4073,6,1),(13659,4074,1,1),(13660,4074,6,1),(13661,4074,8,1),(13662,4074,2,1),(13663,4075,9,1),(13664,4075,2,1),(13665,4076,10,1),(13666,4076,5,1),(13667,4077,10,1),(13668,4077,2,1),(13669,4077,6,1),(13670,4078,7,2),(13671,4078,3,1),(13672,4078,1,1),(13673,4078,4,1),(13674,4078,2,1),(13675,4079,3,1),(13676,4080,2,1),(13677,4080,3,2),(13678,4081,9,1),(13679,4081,10,1),(13680,4081,5,1),(13681,4081,4,2),(13682,4081,7,1),(13683,4082,10,1),(13684,4083,10,1),(13685,4083,5,1),(13686,4083,7,1),(13687,4084,8,1),(13688,4085,4,1),(13689,4085,9,1),(13690,4085,8,1),(13691,4086,9,1),(13692,4086,11,1),(13693,4087,9,2),(13694,4087,5,1),(13695,4087,1,2),(13696,4087,3,2),(13697,4088,8,2),(13698,4088,10,1),(13699,4089,10,1),(13700,4089,1,1),(13701,4089,12,1),(13702,4090,8,2),(13703,4090,2,1),(13704,4090,4,1),(13705,4090,10,1),(13706,4091,10,2),(13707,4091,3,1),(13708,4091,1,1),(13709,4091,4,1),(13710,4092,11,1),(13711,4092,2,1),(13712,4093,6,1),(13713,4093,10,1),(13714,4093,7,1),(13715,4093,11,1),(13716,4094,5,2),(13717,4094,8,1),(13718,4095,10,1),(13719,4095,6,2),(13720,4095,4,5),(13721,4095,11,1),(13722,4095,7,2),(13723,4095,5,1),(13724,4096,1,1),(13725,4096,5,1),(13726,4096,2,1),(13727,4096,12,1),(13728,4096,4,1),(13729,4096,3,1),(13730,4097,8,2),(13731,4097,12,1),(13732,4097,11,1),(13733,4097,4,1),(13734,4097,7,2),(13735,4097,10,1),(13736,4097,6,1),(13737,4098,10,2),(13738,4098,6,2),(13739,4098,8,2),(13740,4099,10,1),(13741,4099,4,1),(13742,4099,11,1),(13743,4099,3,1),(13744,4099,6,3),(13745,4100,9,1),(13746,4100,11,1),(13747,4100,4,1),(13748,4100,3,1),(13749,4100,7,1),(13750,4101,5,1),(13751,4101,8,1),(13752,4101,2,1),(13753,4102,2,1),(13754,4102,10,1),(13755,4102,9,1),(13756,4102,1,2),(13757,4102,6,1),(13758,4103,10,1),(13759,4103,8,1),(13760,4103,5,1),(13761,4104,9,1),(13762,4104,4,1),(13763,4104,3,1),(13764,4105,4,1),(13765,4105,7,1),(13766,4105,8,1),(13767,4105,5,1),(13768,4106,7,2),(13769,4106,9,1),(13770,4106,10,1),(13771,4107,9,1),(13772,4107,2,2),(13773,4108,6,2),(13774,4108,7,1),(13775,4108,12,1),(13776,4109,12,1),(13777,4109,5,1),(13778,4110,11,1),(13779,4110,3,1),(13780,4110,5,1),(13781,4110,12,1),(13782,4110,1,1),(13783,4111,1,1),(13784,4111,8,1),(13785,4111,9,1),(13786,4112,2,1),(13787,4112,11,1),(13788,4112,4,1),(13789,4112,7,1),(13790,4112,8,1),(13791,4112,1,1),(13792,4113,10,1),(13793,4113,7,1),(13794,4113,6,1),(13795,4113,2,1),(13796,4113,3,1),(13797,4114,1,1),(13798,4114,6,2),(13799,4114,8,1),(13800,4114,5,1),(13801,4114,10,1),(13802,4115,2,1),(13803,4115,6,1),(13804,4115,8,2),(13805,4115,1,1),(13806,4115,5,1),(13807,4115,7,1),(13808,4116,9,2),(13809,4117,11,1),(13810,4117,8,1),(13811,4117,5,1),(13812,4118,6,2),(13813,4118,12,1),(13814,4118,2,1),(13815,4118,10,2),(13816,4118,5,1),(13817,4119,11,1),(13818,4119,2,1),(13819,4120,9,2),(13820,4120,8,2),(13821,4120,3,1),(13822,4120,7,2),(13823,4120,6,2),(13824,4120,10,1),(13825,4121,11,2),(13826,4121,5,1),(13827,4122,2,1),(13828,4122,12,1),(13829,4122,9,1),(13830,4122,1,1),(13831,4123,4,1),(13832,4123,5,1),(13833,4124,3,2),(13834,4124,5,2),(13835,4124,12,1),(13836,4124,2,2),(13837,4124,9,1),(13838,4124,11,1),(13839,4125,5,3),(13840,4125,6,1),(13841,4125,4,1),(13842,4125,11,1),(13843,4126,10,2),(13844,4126,11,1),(13845,4126,3,1),(13846,4126,4,1),(13847,4126,7,2),(13848,4126,8,1),(13849,4127,7,1),(13850,4127,6,1),(13851,4127,8,1),(13852,4128,8,1),(13853,4128,12,2),(13854,4128,2,1),(13855,4128,1,1),(13856,4129,3,2),(13857,4129,7,1),(13858,4129,10,1),(13859,4129,12,2),(13860,4129,9,1),(13861,4130,12,1),(13862,4130,8,1),(13863,4130,5,1),(13864,4131,11,2),(13865,4131,10,1),(13866,4131,4,2),(13867,4131,5,1),(13868,4131,8,1),(13869,4131,9,1),(13870,4132,12,1),(13871,4132,8,2),(13872,4132,11,3),(13873,4132,10,1),(13874,4132,2,1),(13875,4132,1,2),(13876,4132,6,1),(13877,4132,5,1),(13878,4132,9,1),(13879,4133,12,1),(13880,4133,2,1),(13881,4133,7,2),(13882,4133,10,1),(13883,4133,3,1),(13884,4134,8,2),(13885,4134,11,2),(13886,4134,5,1),(13887,4135,6,1),(13888,4135,9,1),(13889,4135,11,2),(13890,4135,8,1),(13891,4136,2,1),(13892,4136,3,1),(13893,4136,4,1),(13894,4136,12,1),(13895,4136,6,1),(13896,4137,9,1),(13897,4137,8,1),(13898,4137,2,2),(13899,4137,3,1),(13900,4137,6,1),(13901,4138,9,1),(13902,4138,4,1),(13903,4138,7,1),(13904,4139,5,1),(13905,4139,4,1),(13906,4139,11,2),(13907,4139,9,1),(13908,4140,6,1),(13909,4140,11,1),(13910,4140,3,1),(13911,4141,10,1),(13912,4141,7,2),(13913,4141,6,2),(13914,4141,9,2),(13915,4141,2,1),(13916,4141,3,1),(13917,4142,4,2),(13918,4142,3,1),(13919,4142,9,1),(13920,4142,10,1),(13921,4142,7,1),(13922,4142,1,1),(13923,4142,5,2),(13924,4142,11,1),(13925,4143,7,1),(13926,4143,5,1),(13927,4143,10,1),(13928,4143,6,1),(13929,4143,1,2),(13930,4143,8,1),(13931,4144,11,2),(13932,4144,9,1),(13933,4144,10,1),(13934,4145,2,2),(13935,4145,4,1),(13936,4146,6,2),(13937,4146,9,1),(13938,4146,11,1),(13939,4147,1,1),(13940,4147,3,1),(13941,4148,10,1),(13942,4148,12,2),(13943,4149,3,1),(13944,4149,11,1),(13945,4150,8,1),(13946,4150,9,1),(13947,4150,6,1),(13948,4150,12,1),(13949,4151,10,1),(13950,4151,9,1),(13951,4151,1,1),(13952,4151,2,1),(13953,4152,6,1),(13954,4152,11,1),(13955,4152,3,2),(13956,4152,9,1),(13957,4152,12,1),(13958,4153,3,2),(13959,4153,11,1),(13960,4153,6,1),(13961,4154,3,1),(13962,4154,6,1),(13963,4154,5,1),(13964,4154,2,1),(13965,4155,4,1),(13966,4155,7,1),(13967,4155,8,1),(13968,4155,2,1),(13969,4155,1,1),(13970,4156,5,1),(13971,4156,6,1),(13972,4156,1,1),(13973,4156,12,1),(13974,4157,6,1),(13975,4157,5,1),(13976,4157,12,1),(13977,4158,9,2),(13978,4158,2,1),(13979,4158,7,1),(13980,4158,10,1),(13981,4159,1,2),(13982,4159,9,1),(13983,4159,5,1),(13984,4159,7,1),(13985,4160,6,1),(13986,4160,11,1),(13987,4160,12,1),(13988,4160,10,1),(13989,4161,10,1),(13990,4162,10,1),(13991,4162,1,1),(13992,4162,3,1),(13993,4162,9,1),(13994,4163,4,2),(13995,4163,3,2),(13996,4163,8,1),(13997,4163,9,1),(13998,4163,7,1),(13999,4164,2,2),(14000,4164,1,1),(14001,4164,6,1),(14002,4164,11,1),(14003,4165,7,1),(14004,4165,11,1),(14005,4165,4,1),(14006,4165,12,1),(14007,4165,9,1),(14008,4165,10,1),(14009,4166,3,1),(14010,4166,12,1),(14011,4166,6,1),(14012,4167,5,1),(14013,4167,10,1),(14014,4167,3,1),(14015,4168,7,2),(14016,4168,8,1),(14017,4168,6,1),(14018,4168,11,1),(14019,4168,9,1),(14020,4168,4,1),(14021,4169,12,1),(14022,4169,10,1),(14023,4169,2,1),(14024,4169,11,1),(14025,4170,9,1),(14026,4170,7,1),(14027,4170,10,1),(14028,4170,3,1),(14029,4170,6,1),(14030,4171,12,1),(14031,4171,1,1),(14032,4171,8,1),(14033,4171,7,2),(14034,4171,2,1),(14035,4171,6,1),(14036,4171,5,1),(14037,4172,11,1),(14038,4172,2,1),(14039,4172,6,1),(14040,4173,10,1),(14041,4173,5,1),(14042,4173,2,1),(14043,4173,7,1),(14044,4174,4,1),(14045,4174,3,1),(14046,4174,1,1),(14047,4174,8,1),(14048,4174,2,1),(14049,4175,7,2),(14050,4176,2,1),(14051,4176,4,1),(14052,4176,10,1),(14053,4176,9,1),(14054,4176,7,2),(14055,4177,11,1),(14056,4178,9,1),(14057,4178,11,2),(14058,4178,3,2),(14059,4178,8,1),(14060,4179,11,1),(14061,4180,9,2),(14062,4180,4,1),(14063,4180,2,1),(14064,4180,12,1),(14065,4181,7,1),(14066,4181,3,1),(14067,4181,12,1),(14068,4181,5,1),(14069,4182,6,1),(14070,4182,2,1),(14071,4183,4,1),(14072,4183,9,2),(14073,4183,8,1),(14074,4184,6,1),(14075,4184,8,1),(14076,4185,11,3),(14077,4185,1,3),(14078,4185,7,1),(14079,4185,8,1),(14080,4185,2,1),(14081,4185,9,1),(14082,4185,6,1),(14083,4186,11,3),(14084,4186,4,2),(14085,4187,1,1),(14086,4187,5,1),(14087,4187,7,1),(14088,4187,6,2),(14089,4188,1,1),(14090,4188,2,1),(14091,4188,6,1),(14092,4188,5,1),(14093,4188,3,1),(14094,4189,2,2),(14095,4189,3,1),(14096,4189,9,1),(14097,4189,10,1),(14098,4189,8,1),(14099,4189,11,2),(14100,4190,12,1),(14101,4190,3,1),(14102,4191,2,2),(14103,4191,5,1),(14104,4191,1,1),(14105,4192,9,1),(14106,4192,12,1),(14107,4193,7,2),(14108,4193,10,2),(14109,4194,1,2),(14110,4194,7,1),(14111,4194,9,1),(14112,4194,3,2),(14113,4195,3,2),(14114,4195,10,1),(14115,4195,7,1),(14116,4196,5,2),(14117,4196,12,1),(14118,4196,4,1),(14119,4197,7,5),(14120,4197,1,1),(14121,4197,10,1),(14122,4197,6,2),(14123,4198,6,1),(14124,4198,5,1),(14125,4198,8,1),(14126,4199,7,2),(14127,4199,5,1),(14128,4199,9,1),(14129,4199,2,1),(14130,4199,11,1),(14131,4200,6,1),(14132,4201,1,1),(14133,4201,11,2),(14134,4201,6,1),(14135,4201,12,1),(14136,4201,9,1),(14137,4202,2,2),(14138,4202,6,1),(14139,4202,8,1),(14140,4203,4,1),(14141,4204,3,1),(14142,4204,12,1),(14143,4204,6,1),(14144,4205,11,2),(14145,4205,10,1),(14146,4205,1,2),(14147,4206,5,1),(14148,4206,12,1),(14149,4206,1,1),(14150,4207,2,1),(14151,4207,7,1),(14152,4207,11,1),(14153,4208,1,2),(14154,4208,8,1),(14155,4208,7,1),(14156,4209,11,1),(14157,4209,12,1),(14158,4209,4,2),(14159,4210,8,1),(14160,4210,5,1),(14161,4210,9,1),(14162,4210,1,2),(14163,4210,7,1),(14164,4210,4,2),(14165,4211,2,1),(14166,4211,10,1),(14167,4211,1,1),(14168,4212,10,3),(14169,4212,7,1),(14170,4212,9,1),(14171,4212,6,1),(14172,4212,3,1),(14173,4213,10,3),(14174,4213,11,1),(14175,4213,7,1),(14176,4213,8,1),(14177,4213,9,1),(14178,4213,2,1),(14179,4213,4,1),(14180,4214,11,1),(14181,4214,1,2),(14182,4215,5,1),(14183,4215,1,1),(14184,4215,8,1),(14185,4216,9,1),(14186,4216,3,1),(14187,4216,6,1),(14188,4216,8,2),(14189,4216,5,1),(14190,4217,1,1),(14191,4217,6,1),(14192,4218,12,1),(14193,4218,4,1),(14194,4218,2,1),(14195,4218,10,2),(14196,4219,4,1),(14197,4219,7,1),(14198,4219,8,1),(14199,4220,4,2),(14200,4220,6,1),(14201,4220,10,1),(14202,4220,2,1),(14203,4220,11,1),(14204,4220,1,1),(14205,4220,8,1),(14206,4220,5,1),(14207,4221,12,1),(14208,4221,11,1),(14209,4221,8,2),(14210,4221,1,1),(14211,4221,4,1),(14212,4222,12,1),(14213,4222,8,1),(14214,4222,5,1),(14215,4222,2,1);
CREATE TABLE "tickets" (
    "id" integer NOT NULL,
    "date" date NOT NULL,
    "utilisateur_id" integer NOT NULL,
    PRIMARY KEY ("id")
);

INSERT INTO "tickets" VALUES (3985,'2018-06-12',1494),(3986,'2018-06-21',1494),(3987,'2018-07-09',1494),(3988,'2018-07-04',1495),(3989,'2018-06-25',1495),(3990,'2018-06-16',1496),(3991,'2018-07-06',1496),(3992,'2018-07-01',1496),(3993,'2018-07-07',1496),(3994,'2018-06-16',1496),(3995,'2018-06-26',1497),(3996,'2018-06-10',1498),(3997,'2018-06-16',1498),(3998,'2018-06-18',1498),(3999,'2018-06-20',1498),(4000,'2018-07-11',1498),(4001,'2018-07-07',1498),(4002,'2018-06-30',1499),(4003,'2018-06-15',1499),(4004,'2018-06-29',1499),(4005,'2018-06-24',1500),(4006,'2018-06-25',1500),(4007,'2018-06-20',1500),(4008,'2018-06-09',1500),(4009,'2018-06-30',1500),(4010,'2018-07-11',1501),(4011,'2018-06-13',1501),(4012,'2018-07-07',1502),(4013,'2018-07-07',1502),(4014,'2018-06-16',1502),(4015,'2018-06-25',1502),(4016,'2018-07-08',1502),(4017,'2018-06-15',1503),(4018,'2018-06-16',1503),(4019,'2018-06-25',1503),(4020,'2018-07-10',1504),(4021,'2018-06-28',1504),(4022,'2018-07-03',1504),(4023,'2018-06-10',1505),(4024,'2018-06-25',1506),(4025,'2018-07-06',1506),(4026,'2018-07-10',1507),(4027,'2018-06-09',1507),(4028,'2018-06-18',1507),(4029,'2018-07-01',1508),(4030,'2018-06-15',1508),(4031,'2018-06-28',1508),(4032,'2018-07-01',1509),(4033,'2018-07-01',1510),(4034,'2018-07-08',1510),(4035,'2018-06-19',1510),(4036,'2018-07-01',1510),(4037,'2018-06-21',1510),(4038,'2018-06-12',1511),(4039,'2018-06-14',1511),(4040,'2018-06-15',1511),(4041,'2018-06-18',1511),(4042,'2018-07-07',1511),(4043,'2018-06-18',1511),(4044,'2018-06-16',1512),(4045,'2018-06-15',1512),(4046,'2018-07-07',1512),(4047,'2018-06-29',1512),(4048,'2018-06-16',1512),(4049,'2018-06-12',1513),(4050,'2018-07-01',1513),(4051,'2018-06-14',1513),(4052,'2018-07-08',1515),(4053,'2018-06-20',1515),(4054,'2018-06-14',1515),(4055,'2018-06-26',1515),(4056,'2018-06-27',1515),(4057,'2018-06-19',1516),(4058,'2018-07-08',1516),(4059,'2018-07-04',1516),(4060,'2018-07-02',1516),(4061,'2018-06-17',1516),(4062,'2018-06-22',1517),(4063,'2018-07-03',1517),(4064,'2018-06-25',1517),(4065,'2018-07-06',1518),(4066,'2018-07-01',1518),(4067,'2018-06-12',1519),(4068,'2018-06-19',1519),(4069,'2018-06-28',1519),(4070,'2018-06-27',1519),(4071,'2018-06-25',1519),(4072,'2018-07-11',1519),(4073,'2018-06-30',1519),(4074,'2018-07-07',1520),(4075,'2018-06-29',1520),(4076,'2018-06-19',1520),(4077,'2018-06-12',1520),(4078,'2018-07-04',1520),(4079,'2018-06-21',1521),(4080,'2018-06-27',1521),(4081,'2018-06-18',1522),(4082,'2018-06-26',1523),(4083,'2018-06-21',1523),(4084,'2018-06-17',1523),(4085,'2018-06-23',1524),(4086,'2018-06-12',1524),(4087,'2018-06-17',1525),(4088,'2018-06-23',1525),(4089,'2018-07-05',1526),(4090,'2018-07-05',1526),(4091,'2018-06-19',1526),(4092,'2018-06-11',1526),(4093,'2018-06-22',1527),(4094,'2018-06-30',1527),(4095,'2018-06-29',1527),(4096,'2018-06-30',1527),(4097,'2018-06-29',1528),(4098,'2018-07-05',1528),(4099,'2018-06-30',1529),(4100,'2018-07-06',1529),(4101,'2018-06-24',1529),(4102,'2018-06-11',1529),(4103,'2018-06-12',1529),(4104,'2018-06-22',1529),(4105,'2018-07-03',1529),(4106,'2018-06-23',1530),(4107,'2018-06-15',1531),(4108,'2018-06-10',1531),(4109,'2018-07-05',1531),(4110,'2018-06-17',1531),(4111,'2018-06-24',1531),(4112,'2018-06-21',1532),(4113,'2018-06-09',1532),(4114,'2018-07-03',1533),(4115,'2018-07-05',1533),(4116,'2018-06-19',1533),(4117,'2018-06-14',1533),(4118,'2018-06-23',1533),(4119,'2018-07-09',1533),(4120,'2018-06-22',1534),(4121,'2018-07-05',1534),(4122,'2018-06-19',1534),(4123,'2018-06-14',1534),(4124,'2018-06-24',1535),(4125,'2018-06-18',1535),(4126,'2018-06-20',1535),(4127,'2018-06-29',1535),(4128,'2018-06-18',1535),(4129,'2018-06-27',1535),(4130,'2018-07-06',1535),(4131,'2018-07-03',1535),(4132,'2018-07-03',1535),(4133,'2018-06-26',1535),(4134,'2018-06-13',1535),(4135,'2018-06-27',1535),(4136,'2018-06-15',1536),(4137,'2018-07-09',1536),(4138,'2018-06-27',1536),(4139,'2018-06-21',1536),(4140,'2018-06-23',1537),(4141,'2018-06-23',1537),(4142,'2018-06-27',1537),(4143,'2018-07-08',1537),(4144,'2018-06-13',1537),(4145,'2018-06-16',1537),(4146,'2018-06-14',1537),(4147,'2018-07-05',1537),(4148,'2018-07-09',1538),(4149,'2018-06-11',1538),(4150,'2018-07-04',1538),(4151,'2018-07-11',1538),(4152,'2018-06-22',1538),(4153,'2018-07-05',1538),(4154,'2018-06-22',1539),(4155,'2018-07-10',1539),(4156,'2018-06-29',1539),(4157,'2018-06-17',1540),(4158,'2018-07-02',1540),(4159,'2018-06-25',1541),(4160,'2018-07-09',1541),(4161,'2018-06-10',1541),(4162,'2018-06-19',1541),(4163,'2018-07-03',1541),(4164,'2018-06-26',1541),(4165,'2018-06-09',1541),(4166,'2018-07-05',1541),(4167,'2018-06-12',1542),(4168,'2018-06-23',1542),(4169,'2018-07-04',1543),(4170,'2018-06-12',1543),(4171,'2018-06-12',1544),(4172,'2018-07-03',1544),(4173,'2018-06-14',1545),(4174,'2018-06-14',1545),(4175,'2018-06-30',1545),(4176,'2018-06-19',1545),(4177,'2018-06-15',1545),(4178,'2018-06-10',1546),(4179,'2018-06-17',1546),(4180,'2018-06-17',1546),(4181,'2018-06-28',1546),(4182,'2018-06-22',1546),(4183,'2018-06-23',1547),(4184,'2018-07-03',1548),(4185,'2018-06-19',1548),(4186,'2018-07-11',1548),(4187,'2018-07-09',1548),(4188,'2018-07-08',1549),(4189,'2018-06-13',1549),(4190,'2018-06-09',1549),(4191,'2018-07-11',1549),(4192,'2018-07-06',1550),(4193,'2018-07-04',1551),(4194,'2018-07-11',1551),(4195,'2018-07-03',1552),(4196,'2018-07-10',1552),(4197,'2018-06-27',1552),(4198,'2018-06-16',1552),(4199,'2018-06-29',1552),(4200,'2018-06-15',1552),(4201,'2018-06-10',1553),(4202,'2018-07-06',1554),(4203,'2018-07-08',1554),(4204,'2018-06-13',1555),(4205,'2018-07-09',1555),(4206,'2018-06-26',1555),(4207,'2018-06-22',1555),(4208,'2018-06-20',1555),(4209,'2018-07-06',1555),(4210,'2018-06-20',1556),(4211,'2018-06-19',1556),(4212,'2018-07-10',1556),(4213,'2018-07-10',1556),(4214,'2018-06-23',1556),(4215,'2018-06-21',1556),(4216,'2018-07-01',1557),(4217,'2018-06-10',1557),(4218,'2018-07-04',1557),(4219,'2018-06-27',1557),(4220,'2018-06-11',1557),(4221,'2018-07-09',1557),(4222,'2018-06-24',1557);
CREATE TABLE "utilisateurs" (
    "id" integer NOT NULL,
    "prenom" text NOT NULL,
    "nom" text NOT NULL,
	"is_admin" boolean NOT NULL,
    PRIMARY KEY ("id")
);

INSERT INTO "utilisateurs" VALUES (1494,'Yoann','Euler',false),(1495,'Carlos','Quartz',false),(1496,'Henry','Schmitz',false),(1497,'Paul','Jones',false),(1498,'Martin','Schmitz',false),(1499,'Patrick','Gratz',false),(1500,'Juan','Farmer',false),(1501,'Stan','McKormick',false),(1502,'Paul','Gratz',false),(1503,'Yann','Jones',false),(1504,'Clara','Trudeau',false),(1505,'Juan','Xavier',false),(1506,'Hugo','Wang',false),(1507,'Tara','Farmer',false),(1508,'Travis','Pratz',false),(1509,'Jack','Pablo',false),(1510,'Eric','Descartes',false),(1511,'Jeremy','Quartz',false),(1512,'Eric','Westford',false),(1513,'Jane','Descartes',false),(1514,'Jessica','Strauss',false),(1515,'Clara','Strauss',false),(1516,'Nicolas','Euler',false),(1517,'Jacob','Hertz',false),(1518,'Stan','Schmitz',false),(1519,'Ben','Descartes',false),(1520,'Travis','Quartz',false),(1521,'Clara','Pratz',false),(1522,'Renee','Westford',false),(1523,'Stan','Bauer',false),(1524,'Nicolas','Gratz',false),(1525,'Tara','McKormick',false),(1526,'Yuri','Hertz',false),(1527,'Nicolas','Pablo',false),(1528,'Jane','Wang',false),(1529,'Ben','Hertz',false),(1530,'Patrick','Austin',false),(1531,'Yuri','Klein',false),(1532,'Malcolm','Brown',false),(1533,'Jessica','Brown',false),(1534,'Mary','Walker',false),(1535,'Elvis','Quartz',false),(1536,'Yann','Smith',false),(1537,'Yuri','Pablo',false),(1538,'Hugo','Pratz',false),(1539,'Mary','Trudeau',false),(1540,'Yann','Brown',false),(1541,'Stanley','Pablo',false),(1542,'Travis','Descartes',false),(1543,'Hugo','Xavier',false),(1544,'Juan','Klein',false),(1545,'Joanna','Bauer',false),(1546,'Carlos','Klein',false),(1547,'Yuri','Descartes',false),(1548,'Mary','Westford',false),(1549,'Jessica','Kraft',false),(1550,'Joanna','Walker',false),(1551,'Bob','Pratz',false),(1552,'Jessica','Lagrange',false),(1553,'Stanley','Austin',false),(1554,'Eric','Pablo',false),(1555,'Martin','Bauer',false),(1556,'Emily','Euler',false),(1557,'Mary','Descartes',true);

-- Post-data save --
COMMIT;
START TRANSACTION;

-- Typecasts --

-- Foreign keys --
ALTER TABLE "produits" ADD CONSTRAINT "categorie" FOREIGN KEY ("categorie_id") REFERENCES "categories" ("id") DEFERRABLE INITIALLY DEFERRED;
CREATE INDEX ON "produits" ("categorie_id");
ALTER TABLE "ticket_entry" ADD CONSTRAINT "produit" FOREIGN KEY ("produit_id") REFERENCES "produits" ("id") DEFERRABLE INITIALLY DEFERRED;
CREATE INDEX ON "ticket_entry" ("produit_id");
ALTER TABLE "ticket_entry" ADD CONSTRAINT "ticket" FOREIGN KEY ("ticket_id") REFERENCES "tickets" ("id") DEFERRABLE INITIALLY DEFERRED;
CREATE INDEX ON "ticket_entry" ("ticket_id");
ALTER TABLE "tickets" ADD CONSTRAINT "utilisateur" FOREIGN KEY ("utilisateur_id") REFERENCES "utilisateurs" ("id") DEFERRABLE INITIALLY DEFERRED;
CREATE INDEX ON "tickets" ("utilisateur_id");

-- Sequences --
CREATE SEQUENCE categories_id_seq;
SELECT setval('categories_id_seq', max(id)) FROM categories;
ALTER TABLE "categories" ALTER COLUMN "id" SET DEFAULT nextval('categories_id_seq');
CREATE SEQUENCE produits_id_seq;
SELECT setval('produits_id_seq', max(id)) FROM produits;
ALTER TABLE "produits" ALTER COLUMN "id" SET DEFAULT nextval('produits_id_seq');
CREATE SEQUENCE ticket_entry_id_seq;
SELECT setval('ticket_entry_id_seq', max(id)) FROM ticket_entry;
ALTER TABLE "ticket_entry" ALTER COLUMN "id" SET DEFAULT nextval('ticket_entry_id_seq');
CREATE SEQUENCE tickets_id_seq;
SELECT setval('tickets_id_seq', max(id)) FROM tickets;
ALTER TABLE "tickets" ALTER COLUMN "id" SET DEFAULT nextval('tickets_id_seq');
CREATE SEQUENCE utilisateurs_id_seq;
SELECT setval('utilisateurs_id_seq', max(id)) FROM utilisateurs;
ALTER TABLE "utilisateurs" ALTER COLUMN "id" SET DEFAULT nextval('utilisateurs_id_seq');

-- Full Text keys --

COMMIT;
