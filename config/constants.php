<?php

const USER_ROLE_SUPER_ADMIN = 'super_admin';
const USER_ROLE_ADMIN = 'admin';
const USER_ROLE_DIS_ADMIN = 'dis_admin';
const USER_ROLE_UPO_ADMIN = 'upo_admin';
const USER_ROLE_UNI_ADMIN = 'uni_admin';
const USER_ROLE_WARD_ADMIN = 'ward_admin';

//status
const STATUS_APPROVE = 'approve';
const STATUS_PENDING = 'pending';
const STATUS_INACTIVE = 'inactive';
const STATUS_ACTIVE = 'active';

//gender
const GENDER_MALE ='male';
const GENDER_FEMALE ='female';
const ALL_GENDER = [GENDER_MALE, GENDER_FEMALE];

const GENDER_MALE_BANGLA ='পুরুষ';
const GENDER_FEMALE_BANGLA ='ম‌হিলা';
const ALL_GENDER_BANGLA = [GENDER_MALE_BANGLA, GENDER_FEMALE_BANGLA];

//religion
const ALL_RELIGION_BANGLA = [
    'ইসলাম',
    'সনাতন',
    'বৈাদ্ধ',
    'খ্রিস্টান',
];

const ALL_RELIGION = [
    'islam',
    'hindu',
    'christian',
    'buddhist',
    'jewish',
    'other'
];
const BANGLA_MONTHS = [
    "জানুয়ারি",
    "ফেব্রুয়ারি",
    "মার্চ",
    "এপ্রিল",
    "মে",
    "জুন",
    "জুলাই",
    "আগস্ট",
    "সেপ্টেম্বর",
    "অক্টোবর",
    "নভেম্বর",
    "ডিসেম্বর"
];
const ENGLISH_MONTHS = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December"
];

const BANGLA_DAYS = [
    "১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "১০",
    "১১", "১২", "১৩", "১৪", "১৫", "১৬", "১৭", "১৮", "১৯", "২০",
    "২১", "২২", "২৩", "২৪", "২৫", "২৬", "২৭", "২৮", "২৯", "৩০", "৩১"
];
const ENGLISH_DAYS = [
    "1", "2", "3", "4", "5", "6", "7", "8", "9", "10",
    "11", "12", "13", "14", "15", "16", "17", "18", "19", "20",
    "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"
];

const BANGLA_YEARS = [
    "২০২৫", "২০২৪", "২০২৩", "২০২২", "২০২১", "২০২০", "২০১৯", "২০১৮", "২০১৭", "২০১৬",
    "২০১৫", "২০১৪", "২০১৩", "২০১২", "২০১১", "২০১০", "২০০৯", "২০০৮", "২০০৭", "২০০৬",
    "২০০৫", "২০০৪", "২০০৩", "২০০২", "২০০১", "২০০০", "১৯৯৯", "১৯৯৮", "১৯৯৭", "১৯৯৬",
    "১৯৯৫", "১৯৯৪", "১৯৯৩", "১৯৯২", "১৯৯১", "১৯৯০", "১৯৮৯", "১৯৮৮", "১৯৮৭", "১৯৮৬",
    "১৯৮৫", "১৯৮৪", "১৯৮৩", "১৯৮২", "১৯৮১", "১৯৮০", "১৯৭৯", "১৯৭৮", "১৯৭৭", "১৯৭৬",
    "১৯৭৫", "১৯৭৪", "১৯৭৩", "১৯৭২", "১৯৭১", "১৯৭০", "১৯৬৯", "১৯৬৮", "১৯৬৭", "১৯৬৬",
    "১৯৬৫", "১৯৬৪", "১৯৬৩", "১৯৬২", "১৯৬১", "১৯৬০", "১৯৫৯", "১৯৫৮", "১৯৫৭", "১৯৫৬",
    "১৯৫৫", "১৯৫৪", "১৯৫৩", "১৯৫২", "১৯৫১", "১৯৫০"
];


const FILE_STORE_PATH ='uploads';
