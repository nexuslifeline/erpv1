# SQL Manager 2010 Lite for MySQL 4.6.0.5
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : erp


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE `erp`
    CHARACTER SET 'latin1'
    COLLATE 'latin1_swedish_ci';

USE `erp`;

#
# Structure for the `account_classes` table : 
#

CREATE TABLE `account_classes` (
  `account_class_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `account_class` varchar(755) DEFAULT '',
  `description` varchar(1000) DEFAULT '',
  `account_type_id` int(11) DEFAULT '0',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` date DEFAULT '0000-00-00',
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by_user` int(11) DEFAULT '0',
  `modified_by_user` int(11) DEFAULT '0',
  `deleted_by_user` int(11) DEFAULT '0',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`account_class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# Structure for the `account_integration` table : 
#

CREATE TABLE `account_integration` (
  `integration_id` int(11) NOT NULL,
  `input_tax_account_id` bigint(20) DEFAULT '0',
  `payable_account_id` bigint(20) DEFAULT '0',
  `payable_discount_account_id` bigint(20) DEFAULT '0',
  `output_tax_account_id` bigint(20) DEFAULT '0',
  `receivable_account_id` bigint(20) DEFAULT '0',
  `receivable_discount_account_id` bigint(20) DEFAULT '0',
  PRIMARY KEY (`integration_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `account_titles` table : 
#

CREATE TABLE `account_titles` (
  `account_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `account_no` varchar(75) DEFAULT '',
  `account_title` varchar(755) DEFAULT '',
  `account_class_id` int(11) DEFAULT '0',
  `parent_account_id` int(11) DEFAULT '0',
  `grand_parent_id` int(11) DEFAULT '0',
  `description` varchar(1000) DEFAULT '',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime DEFAULT '0000-00-00 00:00:00',
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by_user` int(11) DEFAULT '0',
  `modified_by_user` int(11) DEFAULT '0',
  `deleted_by_user` int(11) DEFAULT '0',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

#
# Structure for the `account_types` table : 
#

CREATE TABLE `account_types` (
  `account_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_type` varchar(155) DEFAULT '',
  `description` varchar(1000) DEFAULT '',
  PRIMARY KEY (`account_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Structure for the `account_year` table : 
#

CREATE TABLE `account_year` (
  `account_year_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `account_year` varchar(100) DEFAULT '',
  `description` varchar(755) DEFAULT '',
  `status` varchar(100) DEFAULT NULL,
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by_user` int(11) DEFAULT '0',
  `date_closed` datetime DEFAULT '0000-00-00 00:00:00',
  `closed_by_user` int(11) DEFAULT '0',
  PRIMARY KEY (`account_year_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for the `adjustment_info` table : 
#

CREATE TABLE `adjustment_info` (
  `adjustment_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `adjustment_code` varchar(75) DEFAULT '',
  `department_id` int(11) DEFAULT '0',
  `remarks` varchar(755) DEFAULT '',
  `adjustment_type` varchar(20) DEFAULT 'IN',
  `total_discount` decimal(20,2) DEFAULT '0.00',
  `total_before_tax` decimal(20,2) DEFAULT '0.00',
  `total_after_tax` decimal(20,2) DEFAULT '0.00',
  `total_tax_amount` decimal(20,2) DEFAULT '0.00',
  `date_adjusted` date DEFAULT '0000-00-00',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `date_deleted` datetime DEFAULT NULL,
  `posted_by_user` int(11) DEFAULT '0',
  `modified_by_user` int(11) DEFAULT '0',
  `deleted_by_user` int(11) DEFAULT '0',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`adjustment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for the `adjustment_items` table : 
#

CREATE TABLE `adjustment_items` (
  `adjustment_item_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `adjustment_id` int(11) DEFAULT '0',
  `product_id` int(11) DEFAULT '0',
  `unit_id` int(11) DEFAULT '0',
  `adjust_qty` decimal(20,2) DEFAULT '0.00',
  `adjust_price` decimal(20,2) DEFAULT '0.00',
  `adjust_discount` decimal(20,2) DEFAULT '0.00',
  `adjust_tax_rate` decimal(20,2) DEFAULT '0.00',
  `adjust_line_total_price` decimal(20,2) DEFAULT '0.00',
  `adjust_line_total_discount` decimal(20,2) DEFAULT '0.00',
  `adjust_tax_amount` decimal(20,2) DEFAULT '0.00',
  `adjust_non_tax_amount` decimal(11,2) DEFAULT '0.00',
  PRIMARY KEY (`adjustment_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `approval_status` table : 
#

CREATE TABLE `approval_status` (
  `approval_id` int(11) NOT NULL AUTO_INCREMENT,
  `approval_status` varchar(100) DEFAULT '',
  `approval_description` varchar(555) DEFAULT '',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`approval_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `brands` table : 
#

CREATE TABLE `brands` (
  `brand_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) DEFAULT NULL,
  `is_deleted` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Structure for the `cards` table : 
#

CREATE TABLE `cards` (
  `card_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `card_name` varchar(255) DEFAULT NULL,
  `is_deleted` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`card_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `categories` table : 
#

CREATE TABLE `categories` (
  `category_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `category_code` bigint(20) DEFAULT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `category_desc` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `is_deleted` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `company_info` table : 
#

CREATE TABLE `company_info` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(555) DEFAULT '',
  `company_address` varchar(755) DEFAULT '',
  `email_address` varchar(155) DEFAULT '',
  `mobile_no` varchar(125) DEFAULT '',
  `landline` varchar(125) DEFAULT '',
  `tin_no` varchar(55) DEFAULT NULL,
  `tax_type_id` int(11) DEFAULT '0',
  `registered_to` varchar(555) DEFAULT '',
  `logo_path` varchar(555) DEFAULT '',
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for the `customer_photos` table : 
#

CREATE TABLE `customer_photos` (
  `photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT '0',
  `photo_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Structure for the `customers` table : 
#

CREATE TABLE `customers` (
  `customer_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_code` varchar(125) DEFAULT '',
  `customer_name` varchar(555) DEFAULT '',
  `address` varchar(555) DEFAULT '',
  `email_address` varchar(100) DEFAULT '',
  `landline` varchar(100) DEFAULT '',
  `mobile_no` varchar(100) DEFAULT '',
  `total_receivable_amount` decimal(20,2) DEFAULT '0.00',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime DEFAULT '0000-00-00 00:00:00',
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `posted_by_user` int(11) DEFAULT '0',
  `modified_by_user` int(11) DEFAULT '0',
  `deleted_by_user` int(11) DEFAULT '0',
  `is_paid` bit(1) DEFAULT b'0',
  `is_deleted` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Structure for the `delivery_invoice` table : 
#

CREATE TABLE `delivery_invoice` (
  `dr_invoice_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `dr_invoice_no` varchar(75) DEFAULT '',
  `purchase_order_id` int(11) DEFAULT '0',
  `external_ref_no` varchar(75) DEFAULT '',
  `contact_person` varchar(155) DEFAULT '',
  `terms` varchar(55) DEFAULT '',
  `duration` varchar(75) DEFAULT '',
  `supplier_id` int(11) DEFAULT '0',
  `tax_type_id` int(11) DEFAULT '0',
  `journal_id` bigint(20) DEFAULT '0',
  `remarks` varchar(555) DEFAULT '',
  `total_discount` decimal(20,2) DEFAULT '0.00',
  `total_before_tax` decimal(20,2) DEFAULT '0.00',
  `total_tax_amount` decimal(20,2) DEFAULT '0.00',
  `total_after_tax` decimal(20,2) DEFAULT '0.00',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  `is_paid` bit(1) DEFAULT b'0',
  `is_journal_posted` bit(1) DEFAULT b'0',
  `date_due` date DEFAULT '0000-00-00',
  `date_delivered` date DEFAULT '0000-00-00',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `posted_by_user` int(11) DEFAULT '0',
  `modified_by_user` int(11) DEFAULT '0',
  `deleted_by_user` int(11) DEFAULT '0',
  PRIMARY KEY (`dr_invoice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Structure for the `delivery_invoice_items` table : 
#

CREATE TABLE `delivery_invoice_items` (
  `dr_invoice_item_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `dr_invoice_id` bigint(20) DEFAULT '0',
  `product_id` int(11) DEFAULT '0',
  `unit_id` int(11) DEFAULT '0',
  `dr_qty` decimal(20,2) DEFAULT '0.00',
  `dr_discount` decimal(20,2) DEFAULT '0.00',
  `dr_price` decimal(20,2) DEFAULT '0.00',
  `dr_line_total_discount` decimal(20,2) DEFAULT '0.00',
  `dr_line_total_price` decimal(20,2) DEFAULT '0.00',
  `dr_tax_rate` decimal(20,2) DEFAULT '0.00',
  `dr_tax_amount` decimal(20,2) DEFAULT '0.00',
  `dr_non_tax_amount` decimal(20,2) DEFAULT '0.00',
  PRIMARY KEY (`dr_invoice_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# Structure for the `departments` table : 
#

CREATE TABLE `departments` (
  `department_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `department_code` varchar(20) DEFAULT '',
  `department_name` varchar(255) DEFAULT NULL,
  `department_desc` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `is_deleted` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for the `discounts` table : 
#

CREATE TABLE `discounts` (
  `discount_id` bigint(100) NOT NULL AUTO_INCREMENT,
  `discount_code` bigint(100) DEFAULT NULL,
  `discount_type` varchar(200) DEFAULT NULL,
  `discount_desc` varchar(200) DEFAULT NULL,
  `discount_percent` bigint(100) DEFAULT NULL,
  `discount_amount` bigint(100) DEFAULT NULL,
  `is_deleted` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`discount_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `generics` table : 
#

CREATE TABLE `generics` (
  `generic_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `generic_name` varchar(255) DEFAULT NULL,
  `is_deleted` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`generic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `giftcards` table : 
#

CREATE TABLE `giftcards` (
  `giftcard_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `giftcard_name` varchar(255) DEFAULT NULL,
  `is_deleted` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`giftcard_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `issuance_info` table : 
#

CREATE TABLE `issuance_info` (
  `issuance_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `slip_no` varchar(75) DEFAULT '',
  `issued_department_id` int(11) DEFAULT '0',
  `remarks` varchar(755) DEFAULT '',
  `issued_to_person` varchar(155) DEFAULT '',
  `total_discount` decimal(20,2) DEFAULT '0.00',
  `total_before_tax` decimal(20,2) DEFAULT '0.00',
  `total_tax_amount` decimal(20,2) DEFAULT '0.00',
  `total_after_tax` decimal(20,2) DEFAULT '0.00',
  `date_issued` date DEFAULT '0000-00-00',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `modified_by_user` int(11) DEFAULT '0',
  `posted_by_user` int(11) DEFAULT '0',
  `deleted_by_user` int(11) DEFAULT '0',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`issuance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for the `issuance_items` table : 
#

CREATE TABLE `issuance_items` (
  `issuance_item_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `issuance_id` int(11) DEFAULT '0',
  `product_id` int(11) DEFAULT '0',
  `unit_id` int(11) DEFAULT '0',
  `issue_qty` decimal(20,2) DEFAULT '0.00',
  `issue_price` decimal(20,2) DEFAULT '0.00',
  `issue_discount` decimal(20,2) DEFAULT '0.00',
  `issue_tax_rate` decimal(11,2) DEFAULT '0.00',
  `issue_line_total_price` decimal(20,2) DEFAULT '0.00',
  `issue_line_total_discount` decimal(20,2) DEFAULT '0.00',
  `issue_tax_amount` decimal(20,2) DEFAULT '0.00',
  `issue_non_tax_amount` decimal(20,2) DEFAULT '0.00',
  PRIMARY KEY (`issuance_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for the `item_types` table : 
#

CREATE TABLE `item_types` (
  `item_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_type` varchar(255) DEFAULT '',
  `description` varchar(1000) DEFAULT '',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`item_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Structure for the `journal_accounts` table : 
#

CREATE TABLE `journal_accounts` (
  `journal_account_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `journal_id` bigint(20) DEFAULT '0',
  `account_id` int(11) DEFAULT '0',
  `memo` varchar(700) DEFAULT '',
  `dr_amount` decimal(25,2) DEFAULT '0.00',
  `cr_amount` decimal(25,2) DEFAULT '0.00',
  PRIMARY KEY (`journal_account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Structure for the `journal_info` table : 
#

CREATE TABLE `journal_info` (
  `journal_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `txn_no` varchar(55) DEFAULT '',
  `department_id` int(11) DEFAULT '0',
  `customer_id` int(11) DEFAULT '0',
  `supplier_id` int(11) DEFAULT '0',
  `remarks` varchar(555) DEFAULT '',
  `book_type` varchar(20) DEFAULT '',
  `date_txn` date DEFAULT '0000-00-00',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by_user` int(11) DEFAULT '0',
  `date_modified` datetime DEFAULT '0000-00-00 00:00:00',
  `modified_by_user` datetime DEFAULT '0000-00-00 00:00:00',
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `deleted_by_user` int(11) DEFAULT '0',
  `is_deleted` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`journal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Structure for the `locations` table : 
#

CREATE TABLE `locations` (
  `location_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(255) DEFAULT NULL,
  `is_deleted` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `order_status` table : 
#

CREATE TABLE `order_status` (
  `order_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_status` varchar(75) DEFAULT '',
  `order_description` varchar(555) DEFAULT '',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`order_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Structure for the `payable_payments` table : 
#

CREATE TABLE `payable_payments` (
  `payment_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `receipt_no` varchar(75) DEFAULT '',
  `supplier_id` bigint(20) DEFAULT '0',
  `remarks` varchar(755) DEFAULT '',
  `total_paid_amount` decimal(20,2) DEFAULT '0.00',
  `date_paid` date DEFAULT '0000-00-00',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `date_cancelled` datetime DEFAULT '0000-00-00 00:00:00',
  `cancelled_by_user` int(11) DEFAULT '0',
  `created_by_user` int(11) DEFAULT '0',
  `deleted_by_user` int(11) DEFAULT '0',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Structure for the `payable_payments_list` table : 
#

CREATE TABLE `payable_payments_list` (
  `payment_list_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `payment_id` bigint(20) DEFAULT '0',
  `dr_invoice_id` bigint(20) DEFAULT '0',
  `payable_amount` decimal(20,2) DEFAULT '0.00',
  `payment_amount` decimal(20,2) DEFAULT '0.00',
  PRIMARY KEY (`payment_list_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Structure for the `payment_methods` table : 
#

CREATE TABLE `payment_methods` (
  `payment_method_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_method` varchar(100) DEFAULT '',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`payment_method_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Structure for the `po_attachments` table : 
#

CREATE TABLE `po_attachments` (
  `po_attachment_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `purchase_order_id` bigint(20) DEFAULT '0',
  `orig_file_name` varchar(255) DEFAULT '',
  `server_file_directory` varchar(800) DEFAULT '',
  `date_added` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `added_by_user` int(11) DEFAULT '0',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`po_attachment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

#
# Structure for the `po_messages` table : 
#

CREATE TABLE `po_messages` (
  `po_message_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `purchase_order_id` bigint(20) DEFAULT '0',
  `user_id` int(11) DEFAULT '0',
  `message` text,
  `date_posted` datetime DEFAULT '0000-00-00 00:00:00',
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`po_message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

#
# Structure for the `products` table : 
#

CREATE TABLE `products` (
  `product_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(75) DEFAULT '',
  `product_desc` varchar(255) DEFAULT '',
  `product_desc1` varchar(255) DEFAULT '',
  `category_id` int(11) DEFAULT '0',
  `department_id` int(11) DEFAULT '0',
  `unit_id` int(11) DEFAULT '0',
  `equivalent_points` int(11) DEFAULT '0',
  `product_warn` decimal(16,2) DEFAULT '0.00',
  `product_ideal` decimal(16,2) DEFAULT '0.00',
  `purchase_cost` decimal(16,2) NOT NULL DEFAULT '0.00',
  `markup_percent` decimal(16,2) DEFAULT '0.00',
  `sale_price` decimal(16,2) DEFAULT '0.00',
  `whole_sale` decimal(16,2) DEFAULT '0.00',
  `retailer_price` decimal(16,2) DEFAULT '0.00',
  `special_disc` decimal(16,2) DEFAULT '0.00',
  `valued_customer` decimal(16,2) DEFAULT '0.00',
  `income_account_id` bigint(20) DEFAULT '0',
  `expense_account_id` bigint(20) DEFAULT '0',
  `item_type_id` int(11) DEFAULT '0',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime DEFAULT '0000-00-00 00:00:00',
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by_user` int(11) DEFAULT '0',
  `modified_by_user` int(11) DEFAULT '0',
  `deleted_by_user` int(11) DEFAULT '0',
  `is_inventory` bit(1) DEFAULT b'1',
  `is_tax_exempt` bit(1) DEFAULT b'0',
  `is_deleted` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for the `purchase_order` table : 
#

CREATE TABLE `purchase_order` (
  `purchase_order_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `po_no` varchar(75) DEFAULT '',
  `terms` varchar(55) DEFAULT '',
  `duration` varchar(55) DEFAULT '',
  `deliver_to_address` varchar(755) DEFAULT '',
  `supplier_id` int(11) DEFAULT '0',
  `tax_type_id` int(11) DEFAULT '0',
  `contact_person` varchar(100) DEFAULT '',
  `remarks` varchar(155) DEFAULT '',
  `total_discount` decimal(20,2) DEFAULT '0.00',
  `total_before_tax` decimal(20,2) DEFAULT '0.00',
  `total_tax_amount` decimal(20,2) DEFAULT '0.00',
  `total_after_tax` decimal(20,2) DEFAULT '0.00',
  `approval_id` int(11) DEFAULT '2',
  `order_status_id` int(11) DEFAULT '1',
  `is_email_sent` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `date_approved` datetime DEFAULT '0000-00-00 00:00:00',
  `approved_by_user` int(11) DEFAULT '0',
  `posted_by_user` int(11) DEFAULT '0',
  `deleted_by_user` int(11) DEFAULT '0',
  `modified_by_user` int(11) DEFAULT '0',
  PRIMARY KEY (`purchase_order_id`),
  UNIQUE KEY `po_no` (`po_no`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Structure for the `purchase_order_items` table : 
#

CREATE TABLE `purchase_order_items` (
  `po_item_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `purchase_order_id` int(11) DEFAULT '0',
  `product_id` int(11) DEFAULT '0',
  `unit_id` int(11) DEFAULT '0',
  `po_price` decimal(20,2) DEFAULT '0.00',
  `po_discount` decimal(20,2) DEFAULT '0.00',
  `po_line_total_discount` decimal(20,2) DEFAULT '0.00',
  `po_tax_rate` decimal(11,2) DEFAULT '0.00',
  `po_qty` decimal(20,2) DEFAULT '0.00',
  `po_line_total` decimal(20,2) DEFAULT '0.00',
  `tax_amount` decimal(20,2) DEFAULT '0.00',
  `non_tax_amount` decimal(20,2) DEFAULT '0.00',
  PRIMARY KEY (`po_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Structure for the `receivable_payments` table : 
#

CREATE TABLE `receivable_payments` (
  `payment_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `receipt_no` varchar(20) DEFAULT '',
  `customer_id` int(11) DEFAULT NULL,
  `remarks` varchar(755) DEFAULT '',
  `total_paid_amount` decimal(20,2) DEFAULT '0.00',
  `date_paid` date DEFAULT '0000-00-00',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `date_cancelled` datetime DEFAULT '0000-00-00 00:00:00',
  `cancelled_by_user` int(11) DEFAULT '0',
  `created_by_user` int(11) DEFAULT '0',
  `deleted_by_user` int(11) DEFAULT '0',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Structure for the `receivable_payments_list` table : 
#

CREATE TABLE `receivable_payments_list` (
  `payment_list_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `payment_id` bigint(20) DEFAULT '0',
  `sales_invoice_id` bigint(20) DEFAULT '0',
  `receivable_amount` decimal(20,2) DEFAULT '0.00',
  `payment_amount` decimal(20,2) DEFAULT '0.00',
  PRIMARY KEY (`payment_list_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# Structure for the `rights_links` table : 
#

CREATE TABLE `rights_links` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_code` varchar(100) DEFAULT '',
  `link_code` varchar(20) DEFAULT NULL,
  `link_name` varchar(255) DEFAULT '',
  PRIMARY KEY (`link_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

#
# Structure for the `sales_invoice` table : 
#

CREATE TABLE `sales_invoice` (
  `sales_invoice_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sales_inv_no` varchar(75) DEFAULT '',
  `sales_order_id` bigint(20) DEFAULT '0',
  `sales_order_no` varchar(75) DEFAULT '',
  `department_id` int(11) DEFAULT '0',
  `customer_id` int(11) DEFAULT '0',
  `journal_id` bigint(20) DEFAULT '0',
  `remarks` varchar(755) DEFAULT '',
  `total_discount` decimal(20,2) DEFAULT '0.00',
  `total_before_tax` decimal(20,2) DEFAULT '0.00',
  `total_tax_amount` decimal(20,2) DEFAULT '0.00',
  `total_after_tax` decimal(20,2) DEFAULT '0.00',
  `date_due` date DEFAULT '0000-00-00',
  `date_invoice` date DEFAULT '0000-00-00',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `posted_by_user` int(11) DEFAULT '0',
  `deleted_by_user` int(11) DEFAULT '0',
  `modified_by_user` int(11) DEFAULT '0',
  `is_paid` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  `is_journal_posted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`sales_invoice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Structure for the `sales_invoice_items` table : 
#

CREATE TABLE `sales_invoice_items` (
  `sales_item_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sales_invoice_id` bigint(20) DEFAULT '0',
  `product_id` int(11) DEFAULT '0',
  `unit_id` int(11) DEFAULT '0',
  `inv_price` decimal(20,2) DEFAULT '0.00',
  `inv_discount` decimal(20,2) DEFAULT '0.00',
  `inv_line_total_discount` decimal(20,2) DEFAULT '0.00',
  `inv_tax_rate` decimal(20,2) DEFAULT '0.00',
  `inv_qty` decimal(20,2) DEFAULT NULL,
  `inv_line_total_price` decimal(20,2) DEFAULT '0.00',
  `inv_tax_amount` decimal(20,2) DEFAULT '0.00',
  `inv_non_tax_amount` decimal(20,2) DEFAULT '0.00',
  PRIMARY KEY (`sales_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Structure for the `sales_order` table : 
#

CREATE TABLE `sales_order` (
  `sales_order_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `so_no` varchar(75) DEFAULT '',
  `customer_id` bigint(20) DEFAULT '0',
  `department_id` int(11) DEFAULT '0',
  `remarks` varchar(755) DEFAULT '',
  `total_discount` decimal(20,2) DEFAULT '0.00',
  `total_before_tax` decimal(20,2) DEFAULT '0.00',
  `total_after_tax` decimal(20,2) DEFAULT '0.00',
  `total_tax_amount` decimal(20,2) DEFAULT '0.00',
  `order_status_id` int(11) DEFAULT '1',
  `date_order` date DEFAULT '0000-00-00',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_deleted` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT '0000-00-00 00:00:00',
  `posted_by_user` int(11) DEFAULT '0',
  `modified_by_user` int(11) DEFAULT '0',
  `deleted_by_user` int(11) DEFAULT '0',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`sales_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `sales_order_items` table : 
#

CREATE TABLE `sales_order_items` (
  `sales_order_item_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sales_order_id` bigint(20) DEFAULT NULL,
  `product_id` int(11) DEFAULT '0',
  `unit_id` int(11) DEFAULT NULL,
  `so_qty` decimal(20,2) DEFAULT '0.00',
  `so_price` decimal(20,2) DEFAULT '0.00',
  `so_discount` decimal(20,2) DEFAULT '0.00',
  `so_line_total_discount` decimal(20,2) DEFAULT '0.00',
  `so_tax_rate` decimal(20,2) DEFAULT '0.00',
  `so_line_total_price` decimal(20,2) DEFAULT '0.00',
  `so_tax_amount` decimal(20,2) DEFAULT '0.00',
  `so_non_tax_amount` decimal(20,2) DEFAULT '0.00',
  PRIMARY KEY (`sales_order_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `supplier_photos` table : 
#

CREATE TABLE `supplier_photos` (
  `photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) DEFAULT '0',
  `photo_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

#
# Structure for the `suppliers` table : 
#

CREATE TABLE `suppliers` (
  `supplier_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `supplier_code` varchar(125) DEFAULT '',
  `supplier_name` varchar(555) DEFAULT '',
  `contact_person` varchar(255) DEFAULT '',
  `address` varchar(555) DEFAULT '',
  `email_address` varchar(100) DEFAULT '',
  `landline` varchar(100) DEFAULT '',
  `mobile_no` varchar(100) DEFAULT '',
  `tin_no` varchar(100) DEFAULT '',
  `total_payable_amount` decimal(20,2) DEFAULT '0.00',
  `posted_by_user` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime DEFAULT '0000-00-00 00:00:00',
  `tax_type_id` int(11) DEFAULT '0',
  `is_deleted` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Structure for the `tax_types` table : 
#

CREATE TABLE `tax_types` (
  `tax_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `tax_type` varchar(155) DEFAULT '',
  `tax_rate` decimal(11,2) DEFAULT '0.00',
  `description` varchar(555) DEFAULT '',
  `is_default` bit(1) DEFAULT b'0',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`tax_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Structure for the `units` table : 
#

CREATE TABLE `units` (
  `unit_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `unit_code` bigint(20) DEFAULT NULL,
  `unit_name` varchar(255) DEFAULT NULL,
  `unit_desc` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `is_deleted` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`unit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `user_accounts` table : 
#

CREATE TABLE `user_accounts` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) DEFAULT '',
  `user_pword` varchar(500) DEFAULT '',
  `user_lname` varchar(100) DEFAULT '',
  `user_fname` varchar(100) DEFAULT '',
  `user_mname` varchar(100) DEFAULT '',
  `user_address` varchar(155) DEFAULT '',
  `user_email` varchar(100) DEFAULT '',
  `user_mobile` varchar(100) DEFAULT '',
  `user_telephone` varchar(100) DEFAULT '',
  `user_bdate` date DEFAULT '0000-00-00',
  `user_group_id` int(11) DEFAULT '0',
  `photo_path` varchar(555) DEFAULT '',
  `file_directory` varchar(666) DEFAULT NULL,
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  `date_created` datetime DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `date_deleted` int(11) DEFAULT '0',
  `modified_by_user` int(11) DEFAULT '0',
  `posted_by_user` int(11) DEFAULT '0',
  `deleted_by_user` int(11) DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

#
# Structure for the `user_group_rights` table : 
#

CREATE TABLE `user_group_rights` (
  `user_rights_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) DEFAULT '0',
  `link_code` varchar(20) DEFAULT '',
  PRIMARY KEY (`user_rights_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

#
# Structure for the `user_groups` table : 
#

CREATE TABLE `user_groups` (
  `user_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group` varchar(135) DEFAULT '',
  `user_group_desc` varchar(500) DEFAULT '',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Definition for the `get_product_qty` function : 
#

CREATE DEFINER = 'root'@'localhost' FUNCTION `get_product_qty`(
        product_id INTEGER(20)
    )
    RETURNS decimal(20,0)
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN
	DECLARE IN_QTY DECIMAL;
    DECLARE OUT_QTY DECIMAL;
    DECLARE ADJ_IN_QTY DECIMAL;
    DECLARE ADJ_OUT_QTY DECIMAL;
    
    SET IN_QTY=(
    	SELECT IFNULL(SUM(dii.dr_qty),0) FROM delivery_invoice_items as dii
    	INNER JOIN delivery_invoice as di ON dii.dr_invoice_id=di.dr_invoice_id
    	WHERE dii.product_id=product_id AND di.is_active=TRUE AND di.is_deleted=FALSE
    );
    
    
    SET OUT_QTY=(
    	SELECT IFNULL(SUM(iss.issue_qty),0) FROM issuance_items as iss
    	INNER JOIN issuance_info as ii ON iss.issuance_id=ii.issuance_id
    	WHERE iss.product_id=product_id AND ii.is_active=TRUE AND ii.is_deleted=FALSE
    );
    
    
    SET ADJ_OUT_QTY=(
    	SELECT IFNULL(SUM(ai.adjust_qty),0) FROM adjustment_items as ai
    	INNER JOIN adjustment_info as a ON a.adjustment_id=ai.adjustment_id
    	WHERE ai.product_id=product_id AND a.is_active=TRUE AND a.is_deleted=FALSE 
        AND a.adjustment_type='OUT'
    );
    
    SET ADJ_IN_QTY=(
    	SELECT IFNULL(SUM(ai.adjust_qty),0) FROM adjustment_items as ai
    	INNER JOIN adjustment_info as a ON a.adjustment_id=ai.adjustment_id
    	WHERE ai.product_id=product_id AND a.is_active=TRUE AND a.is_deleted=FALSE 
        AND a.adjustment_type='IN'
    );


  RETURN (IN_QTY-OUT_QTY)+(ADJ_IN_QTY-ADJ_OUT_QTY);
END;

#
# Definition for the `reset_tables` procedure : 
#

CREATE DEFINER = 'root'@'localhost' PROCEDURE `reset_tables`()
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN
	TRUNCATE `purchase_order`;
    TRUNCATE `purchase_order_items`;
    
    TRUNCATE `delivery_invoice`;
    TRUNCATE `delivery_invoice_items`;
    
    TRUNCATE `issuance_info`;
    TRUNCATE `issuance_items`;
    
    TRUNCATE `adjustment_info`;
    TRUNCATE `adjustment_items`;
    
    TRUNCATE `sales_order`;
    TRUNCATE `sales_order_items`;
    
    TRUNCATE products;
    TRUNCATE `categories`;
    TRUNCATE `units`;
    
    TRUNCATE `suppliers`;
    TRUNCATE `supplier_photos`;
    
    TRUNCATE `customers`;
    TRUNCATE `customer_photos`;
    
    TRUNCATE `po_attachments`;
    TRUNCATE `po_messages`;
    
    
END;

#
# Data for the `account_classes` table  (LIMIT 0,500)
#

INSERT INTO `account_classes` (`account_class_id`, `account_class`, `description`, `account_type_id`, `date_created`, `date_modified`, `date_deleted`, `created_by_user`, `modified_by_user`, `deleted_by_user`, `is_active`, `is_deleted`) VALUES 
  (1,'Current Assets','',1,'0000-00-00 00:00:00','0000-00-00','0000-00-00 00:00:00',0,0,0,1,0),
  (2,'Non-Current Assets','',1,'0000-00-00 00:00:00','0000-00-00','0000-00-00 00:00:00',0,0,0,1,0),
  (3,'Current Liabilities','',2,'0000-00-00 00:00:00','0000-00-00','0000-00-00 00:00:00',0,0,0,1,0),
  (4,'Long-term Liabilities','',2,'0000-00-00 00:00:00','0000-00-00','0000-00-00 00:00:00',0,0,0,1,0),
  (5,'Owners Equity','',3,'0000-00-00 00:00:00','0000-00-00','0000-00-00 00:00:00',0,0,0,1,0),
  (6,'Operating Expense','',5,'0000-00-00 00:00:00','0000-00-00','0000-00-00 00:00:00',0,0,0,1,0),
  (7,'Income','',4,'0000-00-00 00:00:00','0000-00-00','0000-00-00 00:00:00',0,0,0,1,0),
  (8,'Non-Current Assets','',1,'2016-09-23 14:44:53','0000-00-00','0000-00-00 00:00:00',1,0,0,1,0);
COMMIT;

#
# Data for the `account_integration` table  (LIMIT 0,500)
#

INSERT INTO `account_integration` (`integration_id`, `input_tax_account_id`, `payable_account_id`, `payable_discount_account_id`, `output_tax_account_id`, `receivable_account_id`, `receivable_discount_account_id`) VALUES 
  (1,10,4,1,11,2,5);
COMMIT;

#
# Data for the `account_titles` table  (LIMIT 0,500)
#

INSERT INTO `account_titles` (`account_id`, `account_no`, `account_title`, `account_class_id`, `parent_account_id`, `grand_parent_id`, `description`, `date_created`, `date_modified`, `date_deleted`, `created_by_user`, `modified_by_user`, `deleted_by_user`, `is_active`, `is_deleted`) VALUES 
  (1,'101','Cash',1,0,1,'','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,0,1,0),
  (2,'120','Account Receivable',1,0,2,'','0000-00-00 00:00:00','2016-09-23 20:27:39','0000-00-00 00:00:00',0,1,0,1,0),
  (3,'140','Inventory',1,0,3,'','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,0,1,0),
  (4,'210','Accounts Payable',3,0,4,'','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,0,1,0),
  (5,'300','Capital',5,0,5,'','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,0,1,0),
  (6,'400','Sales Income',7,0,6,'','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,0,1,0),
  (7,'410','Service Income',7,0,7,'','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,0,1,0),
  (8,'500','Salaries Expense',6,0,8,'','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,0,1,0),
  (9,'510','Supplies Expense',6,0,9,'','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,0,1,0),
  (10,'150','Input Tax',1,0,10,'','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,0,1,0),
  (11,'220','Output Tax',3,0,4,'','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,0,1,0),
  (12,'510','Miscellaneous Expense',6,0,12,'','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,0,1,0),
  (13,'160','Petty Cash',1,0,13,'','2016-09-23 14:44:58','2016-09-23 20:29:02','0000-00-00 00:00:00',1,1,0,1,0);
COMMIT;

#
# Data for the `account_types` table  (LIMIT 0,500)
#

INSERT INTO `account_types` (`account_type_id`, `account_type`, `description`) VALUES 
  (1,'Asset',''),
  (2,'Liability',''),
  (3,'Capital',''),
  (4,'Income',''),
  (5,'Expense','');
COMMIT;

#
# Data for the `account_year` table  (LIMIT 0,500)
#

INSERT INTO `account_year` (`account_year_id`, `account_year`, `description`, `status`, `date_created`, `created_by_user`, `date_closed`, `closed_by_user`) VALUES 
  (1,'2016','',NULL,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0);
COMMIT;

#
# Data for the `adjustment_info` table  (LIMIT 0,500)
#

INSERT INTO `adjustment_info` (`adjustment_id`, `adjustment_code`, `department_id`, `remarks`, `adjustment_type`, `total_discount`, `total_before_tax`, `total_after_tax`, `total_tax_amount`, `date_adjusted`, `date_created`, `date_modified`, `date_deleted`, `posted_by_user`, `modified_by_user`, `deleted_by_user`, `is_active`, `is_deleted`) VALUES 
  (1,'ADJ-20160819-1',1,'','IN',0.00,2020.00,2020.00,0.00,'2016-08-19','2016-08-19 13:20:33','2016-08-19 13:20:33',NULL,1,0,0,1,0);
COMMIT;

#
# Data for the `adjustment_items` table  (LIMIT 0,500)
#

INSERT INTO `adjustment_items` (`adjustment_item_id`, `adjustment_id`, `product_id`, `unit_id`, `adjust_qty`, `adjust_price`, `adjust_discount`, `adjust_tax_rate`, `adjust_line_total_price`, `adjust_line_total_discount`, `adjust_tax_amount`, `adjust_non_tax_amount`) VALUES 
  (1,1,2,1,2.00,1000.00,0.00,0.00,2000.00,0.00,0.00,2000.00),
  (2,1,1,1,2.00,10.00,0.00,0.00,20.00,0.00,0.00,20.00);
COMMIT;

#
# Data for the `approval_status` table  (LIMIT 0,500)
#

INSERT INTO `approval_status` (`approval_id`, `approval_status`, `approval_description`, `is_active`, `is_deleted`) VALUES 
  (1,'Approved','',1,0),
  (2,'Pending','',1,0);
COMMIT;

#
# Data for the `brands` table  (LIMIT 0,500)
#

INSERT INTO `brands` (`brand_id`, `brand_name`, `is_deleted`, `is_active`) VALUES 
  (2,'FFF',0,0),
  (3,'ddd',0,1);
COMMIT;

#
# Data for the `categories` table  (LIMIT 0,500)
#

INSERT INTO `categories` (`category_id`, `category_code`, `category_name`, `category_desc`, `date_created`, `date_modified`, `is_deleted`, `is_active`) VALUES 
  (1,NULL,'Food','',NULL,'0000-00-00 00:00:00',0,1),
  (2,NULL,'none','',NULL,'0000-00-00 00:00:00',0,1);
COMMIT;

#
# Data for the `company_info` table  (LIMIT 0,500)
#

INSERT INTO `company_info` (`company_id`, `company_name`, `company_address`, `email_address`, `mobile_no`, `landline`, `tin_no`, `tax_type_id`, `registered_to`, `logo_path`) VALUES 
  (1,'JDEV IT Business Solution and SMS Professionals','Balibago, Angeles City, Pampanga','bss_consultants@yahoo.com','0935-746-7601','(045) 322-3542','1234-5678-91112',1,'Paul Christian Rueda','assets/img/company/57db79e93df8b.jpg');
COMMIT;

#
# Data for the `customer_photos` table  (LIMIT 0,500)
#

INSERT INTO `customer_photos` (`photo_id`, `customer_id`, `photo_path`) VALUES 
  (1,1,'assets/img/anonymous-icon.png'),
  (2,2,'assets/img/anonymous-icon.png'),
  (3,3,'');
COMMIT;

#
# Data for the `customers` table  (LIMIT 0,500)
#

INSERT INTO `customers` (`customer_id`, `customer_code`, `customer_name`, `address`, `email_address`, `landline`, `mobile_no`, `total_receivable_amount`, `date_created`, `date_modified`, `date_deleted`, `posted_by_user`, `modified_by_user`, `deleted_by_user`, `is_paid`, `is_deleted`, `is_active`) VALUES 
  (1,'','Jennifer Rueda','San Jose, San Simon, Pampanga','jennifer@yahoo.com','','',2644.00,'2016-08-14 18:42:57','0000-00-00 00:00:00','0000-00-00 00:00:00',1,0,0,0,0,1),
  (2,'','Floyd Mayweather','California, USA','floyd@yahoo.com','','',2200.00,'2016-08-14 18:43:38','0000-00-00 00:00:00','0000-00-00 00:00:00',1,0,0,0,0,1),
  (3,'',NULL,NULL,NULL,NULL,NULL,0.00,'2016-08-18 16:49:29','0000-00-00 00:00:00','0000-00-00 00:00:00',1,0,0,0,0,1);
COMMIT;

#
# Data for the `delivery_invoice` table  (LIMIT 0,500)
#

INSERT INTO `delivery_invoice` (`dr_invoice_id`, `dr_invoice_no`, `purchase_order_id`, `external_ref_no`, `contact_person`, `terms`, `duration`, `supplier_id`, `tax_type_id`, `journal_id`, `remarks`, `total_discount`, `total_before_tax`, `total_tax_amount`, `total_after_tax`, `is_active`, `is_deleted`, `is_paid`, `is_journal_posted`, `date_due`, `date_delivered`, `date_created`, `date_modified`, `date_deleted`, `posted_by_user`, `modified_by_user`, `deleted_by_user`) VALUES 
  (1,'P-INV-20160921-1',0,'','','2','Months(s)',2,2,1,'',0.00,446.43,53.57,500.00,1,0,0,1,'2016-09-21','2016-09-21','2016-09-21 09:12:35','2016-09-21 09:12:55','0000-00-00 00:00:00',1,0,0),
  (2,'P-INV-20160921-2',0,'','','3','Months(s)',1,1,0,'',0.00,8928.57,1071.43,10000.00,1,0,0,0,'2016-09-21','2016-09-21','2016-09-21 11:05:10','2016-09-21 11:05:10','0000-00-00 00:00:00',1,0,0),
  (3,'P-INV-20160922-3',0,'','','3','Months(s)',2,4,0,'ddd',0.00,2232.14,267.86,2500.00,1,0,0,0,'2016-09-22','2016-09-22','2016-09-21 18:05:55','2016-09-21 18:05:55','0000-00-00 00:00:00',1,0,0),
  (4,'P-INV-20160923-4',1,'','','2','NA',2,1,11,'',0.00,66964.29,8035.71,75000.00,1,0,0,1,'2016-09-23','2016-09-23','2016-09-22 15:36:16','2016-09-22 15:40:38','0000-00-00 00:00:00',1,0,0),
  (5,'P-INV-20160923-5',2,'','','2','NA',5,1,12,'',0.00,44642.86,5357.14,50000.00,1,0,0,1,'2016-09-23','2016-09-23','2016-09-22 16:59:34','2016-09-22 17:03:35','0000-00-00 00:00:00',1,0,0),
  (6,'P-INV-20160923-6',2,'','','2','NA',5,1,0,'',0.00,44642.86,5357.14,50000.00,1,0,0,0,'2016-09-23','2016-09-23','2016-09-22 17:05:10','2016-09-22 17:05:10','0000-00-00 00:00:00',1,0,0),
  (7,'P-INV-20160923-7',0,'','','2','NA',2,1,0,'',0.00,892857.14,107142.86,1000000.00,1,0,0,0,'2016-09-23','2016-09-23','2016-09-23 11:14:23','2016-09-23 11:15:13','0000-00-00 00:00:00',1,1,0);
COMMIT;

#
# Data for the `delivery_invoice_items` table  (LIMIT 0,500)
#

INSERT INTO `delivery_invoice_items` (`dr_invoice_item_id`, `dr_invoice_id`, `product_id`, `unit_id`, `dr_qty`, `dr_discount`, `dr_price`, `dr_line_total_discount`, `dr_line_total_price`, `dr_tax_rate`, `dr_tax_amount`, `dr_non_tax_amount`) VALUES 
  (1,1,1,1,5.00,0.00,100.00,0.00,500.00,12.00,53.57,446.43),
  (2,2,1,1,10.00,0.00,1000.00,0.00,10000.00,12.00,1071.43,8928.57),
  (3,3,1,1,1.00,0.00,2500.00,0.00,2500.00,12.00,267.86,2232.14),
  (4,4,1,1,30.00,0.00,2500.00,0.00,75000.00,12.00,8035.71,66964.29),
  (5,5,1,1,50.00,0.00,1000.00,0.00,50000.00,12.00,5357.14,44642.86),
  (6,6,1,1,50.00,0.00,1000.00,0.00,50000.00,12.00,5357.14,44642.86),
  (8,7,1,1,1000.00,0.00,1000.00,0.00,1000000.00,12.00,107142.86,892857.14);
COMMIT;

#
# Data for the `departments` table  (LIMIT 0,500)
#

INSERT INTO `departments` (`department_id`, `department_code`, `department_name`, `department_desc`, `date_created`, `date_modified`, `is_deleted`, `is_active`) VALUES 
  (1,'','Main Department','','2016-08-15 20:24:13','0000-00-00 00:00:00',0,1);
COMMIT;

#
# Data for the `issuance_info` table  (LIMIT 0,500)
#

INSERT INTO `issuance_info` (`issuance_id`, `slip_no`, `issued_department_id`, `remarks`, `issued_to_person`, `total_discount`, `total_before_tax`, `total_tax_amount`, `total_after_tax`, `date_issued`, `date_created`, `date_modified`, `date_deleted`, `modified_by_user`, `posted_by_user`, `deleted_by_user`, `is_active`, `is_deleted`) VALUES 
  (1,'SLP-20160815-1',1,'dd','cdd',0.00,20.00,0.00,20.00,'2016-08-15','2016-08-15 11:49:16','2016-08-15 11:49:16','0000-00-00 00:00:00',0,1,0,1,0);
COMMIT;

#
# Data for the `issuance_items` table  (LIMIT 0,500)
#

INSERT INTO `issuance_items` (`issuance_item_id`, `issuance_id`, `product_id`, `unit_id`, `issue_qty`, `issue_price`, `issue_discount`, `issue_tax_rate`, `issue_line_total_price`, `issue_line_total_discount`, `issue_tax_amount`, `issue_non_tax_amount`) VALUES 
  (1,1,1,1,2.00,10.00,0.00,0.00,20.00,0.00,0.00,20.00);
COMMIT;

#
# Data for the `item_types` table  (LIMIT 0,500)
#

INSERT INTO `item_types` (`item_type_id`, `item_type`, `description`, `is_active`, `is_deleted`) VALUES 
  (1,'Inventory','',1,0),
  (2,'Non-inventory','',1,0),
  (3,'Services','',1,0);
COMMIT;

#
# Data for the `journal_accounts` table  (LIMIT 0,500)
#

INSERT INTO `journal_accounts` (`journal_account_id`, `journal_id`, `account_id`, `memo`, `dr_amount`, `cr_amount`) VALUES 
  (1,1,1,'',1500.00,0.00),
  (2,1,4,'',0.00,1500.00),
  (3,2,1,'',3500.00,0.00),
  (4,2,5,'',0.00,3500.00),
  (5,3,6,'',0.00,2000.00),
  (6,3,2,'',2000.00,0.00);
COMMIT;

#
# Data for the `journal_info` table  (LIMIT 0,500)
#

INSERT INTO `journal_info` (`journal_id`, `txn_no`, `department_id`, `customer_id`, `supplier_id`, `remarks`, `book_type`, `date_txn`, `date_created`, `created_by_user`, `date_modified`, `modified_by_user`, `date_deleted`, `deleted_by_user`, `is_deleted`, `is_active`) VALUES 
  (1,'TXN-20160924-1',0,2,0,'ssss','GJE','2016-09-06','2016-09-23 19:12:54',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1),
  (2,'TXN-20160924-2',0,0,1,'','GJE','2016-09-15','2016-09-23 19:14:22',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1),
  (3,'TXN-20160924-3',0,1,0,'','SJE','2016-09-24','2016-09-23 19:34:05',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1);
COMMIT;

#
# Data for the `order_status` table  (LIMIT 0,500)
#

INSERT INTO `order_status` (`order_status_id`, `order_status`, `order_description`, `is_active`, `is_deleted`) VALUES 
  (1,'Open','',1,0),
  (2,'Closed','',1,0),
  (3,'Partially received','',1,0);
COMMIT;

#
# Data for the `payable_payments` table  (LIMIT 0,500)
#

INSERT INTO `payable_payments` (`payment_id`, `receipt_no`, `supplier_id`, `remarks`, `total_paid_amount`, `date_paid`, `date_created`, `date_deleted`, `date_cancelled`, `cancelled_by_user`, `created_by_user`, `deleted_by_user`, `is_active`, `is_deleted`) VALUES 
  (1,'1456',2,'',102.00,'2016-08-14','2016-08-14 10:34:46','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1,0,1,0),
  (2,'456',2,'',998.00,'2016-08-14','2016-08-14 10:53:06','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1,0,1,0),
  (3,'1090',1,'dd',1000.00,'2016-08-27','2016-08-26 15:54:15','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1,0,1,0),
  (4,'123456',1,'',7000.00,'2016-08-27','2016-08-26 15:56:02','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1,0,1,0);
COMMIT;

#
# Data for the `payable_payments_list` table  (LIMIT 0,500)
#

INSERT INTO `payable_payments_list` (`payment_list_id`, `payment_id`, `dr_invoice_id`, `payable_amount`, `payment_amount`) VALUES 
  (1,1,4,20100.00,102.00),
  (2,2,4,19998.00,998.00),
  (3,3,1,8000.00,1000.00),
  (4,4,1,7000.00,7000.00),
  (5,4,2,0.00,0.00);
COMMIT;

#
# Data for the `payment_methods` table  (LIMIT 0,500)
#

INSERT INTO `payment_methods` (`payment_method_id`, `payment_method`, `is_active`, `is_deleted`) VALUES 
  (1,'Cash',1,0),
  (2,'Check',1,0),
  (3,'Card',1,0);
COMMIT;

#
# Data for the `po_attachments` table  (LIMIT 0,500)
#

INSERT INTO `po_attachments` (`po_attachment_id`, `purchase_order_id`, `orig_file_name`, `server_file_directory`, `date_added`, `added_by_user`, `is_deleted`) VALUES 
  (12,1,'Desert.jpg','assets/files/po/attachments/57a35f49a1d20.jpg','2016-08-04 08:29:13',1,0),
  (13,1,'desktop.ini','assets/files/po/attachments/57a35f595fa24.ini','2016-08-04 08:29:29',10,0),
  (14,1,'Koala.jpg','assets/files/po/attachments/57a36038bc160.jpg','2016-08-04 08:33:12',1,0),
  (15,1,'Desert.jpg','assets/files/po/attachments/57a36735f2623.jpg','2016-08-04 09:03:01',1,0),
  (16,1,'Hydrangeas.jpg','assets/files/po/attachments/57a3674c76975.jpg','2016-08-04 09:03:24',1,0),
  (17,2,'Chrysanthemum.jpg','assets/files/po/attachments/57a3efd452bb6.jpg','2016-08-04 18:45:56',1,0),
  (18,2,'Desert.jpg','assets/files/po/attachments/57a3efd460291.jpg','2016-08-04 18:45:56',1,0),
  (19,2,'Lighthouse.jpg','assets/files/po/attachments/57a3efd46e90c.jpg','2016-08-04 18:45:56',1,0),
  (20,2,'Penguins.jpg','assets/files/po/attachments/57a3efd47b42f.jpg','2016-08-04 18:45:56',1,0),
  (21,4,'desktop.ini','assets/files/po/attachments/57a3fc8a14119.ini','2016-08-04 19:40:10',1,0),
  (22,5,'Desert.jpg','assets/files/po/attachments/57a4b2fe12d70.jpg','2016-08-05 08:38:38',1,0),
  (23,6,'Desert.jpg','assets/files/po/attachments/57a5011cef3fc.jpg','2016-08-05 14:11:56',10,0),
  (24,1,'Tulips.jpg','assets/files/po/attachments/57acc3463da99.jpg','2016-08-11 11:26:14',1,0),
  (25,5,'Chrysanthemum.jpg','assets/files/po/attachments/57ad049e86444.jpg','2016-08-11 16:05:02',1,0),
  (26,1,'desktop.ini','assets/files/po/attachments/57af336b9a9ec.ini','2016-08-13 07:49:15',1,0),
  (27,1,'Tulips.jpg','assets/files/po/attachments/57e32f8d94f64.jpg','2016-09-21 18:10:37',10,0);
COMMIT;

#
# Data for the `po_messages` table  (LIMIT 0,500)
#

INSERT INTO `po_messages` (`po_message_id`, `purchase_order_id`, `user_id`, `message`, `date_posted`, `date_deleted`, `is_deleted`) VALUES 
  (51,1,1,'hi','2016-08-04 08:28:55','2016-08-04 08:58:40',1),
  (52,1,10,'hello','2016-08-04 08:29:01','2016-08-04 09:27:35',1),
  (53,4,1,'please send me attachment.','2016-08-04 08:31:32','2016-08-04 19:40:42',1),
  (54,1,1,'ji','2016-08-04 08:44:39','2016-08-04 08:55:38',1),
  (55,1,1,'k','2016-08-04 08:46:24','2016-08-04 08:55:12',1),
  (56,1,1,'l','2016-08-04 08:47:39','2016-08-04 08:54:12',1),
  (57,1,1,'hi','2016-08-04 08:59:55','2016-08-04 08:59:58',1),
  (58,1,1,'k','2016-08-04 09:00:19','2016-08-04 09:00:22',1),
  (59,1,1,'love','2016-08-04 09:00:28','2016-08-04 09:00:30',1),
  (60,1,1,'hello','2016-08-04 09:14:28','0000-00-00 00:00:00',0),
  (61,1,1,'please send me new attachments.','2016-08-04 09:18:15','0000-00-00 00:00:00',0),
  (62,1,1,'kk\\','2016-08-04 09:25:32','2016-08-04 09:25:46',1),
  (63,1,1,'kk','2016-08-04 09:25:33','2016-08-04 09:25:43',1),
  (64,1,1,'hi','2016-08-04 09:26:46','0000-00-00 00:00:00',0),
  (65,1,10,'im busy.','2016-08-04 09:27:02','2016-08-04 09:27:30',1),
  (66,2,1,'hi','2016-08-04 18:48:42','0000-00-00 00:00:00',0),
  (67,2,1,'kindly send me attachment.','2016-08-04 18:49:41','2016-09-12 12:42:15',1),
  (68,4,1,'hello','2016-08-04 19:40:29','0000-00-00 00:00:00',0),
  (69,5,1,'please send me attachment.','2016-08-05 08:39:01','0000-00-00 00:00:00',0),
  (70,6,1,'please send attachment.','2016-08-05 14:10:48','0000-00-00 00:00:00',0),
  (71,6,10,'yes sir. already attached.','2016-08-05 14:12:24','0000-00-00 00:00:00',0),
  (72,6,10,'hi','2016-08-05 14:20:30','0000-00-00 00:00:00',0),
  (73,5,1,'please','2016-08-06 17:04:12','0000-00-00 00:00:00',0),
  (74,1,1,'testing','2016-08-11 11:24:13','0000-00-00 00:00:00',0),
  (75,1,1,'hello','2016-08-11 11:27:12','0000-00-00 00:00:00',0),
  (76,5,10,'please send me attachment.','2016-08-11 16:04:27','0000-00-00 00:00:00',0),
  (77,5,1,'yes sir.','2016-08-11 16:04:44','0000-00-00 00:00:00',0),
  (78,1,1,'hi','2016-08-13 07:49:02','0000-00-00 00:00:00',0),
  (79,2,1,'','2016-09-12 12:42:09','2016-09-12 12:42:13',1),
  (80,2,1,'please send me attachment.','2016-09-12 15:50:10','0000-00-00 00:00:00',0),
  (81,1,10,'hello','2016-09-21 18:10:13','0000-00-00 00:00:00',0);
COMMIT;

#
# Data for the `products` table  (LIMIT 0,500)
#

INSERT INTO `products` (`product_id`, `product_code`, `product_desc`, `product_desc1`, `category_id`, `department_id`, `unit_id`, `equivalent_points`, `product_warn`, `product_ideal`, `purchase_cost`, `markup_percent`, `sale_price`, `whole_sale`, `retailer_price`, `special_disc`, `valued_customer`, `income_account_id`, `expense_account_id`, `item_type_id`, `date_created`, `date_modified`, `date_deleted`, `created_by_user`, `modified_by_user`, `deleted_by_user`, `is_inventory`, `is_tax_exempt`, `is_deleted`, `is_active`) VALUES 
  (1,'1','Steel','',2,0,1,0,0.00,0.00,1000.00,0.00,0.00,0.00,0.00,0.00,0.00,6,12,3,'2016-09-21 09:11:39','2016-09-23 11:26:00','0000-00-00 00:00:00',1,1,0,NULL,0,0,1);
COMMIT;

#
# Data for the `purchase_order` table  (LIMIT 0,500)
#

INSERT INTO `purchase_order` (`purchase_order_id`, `po_no`, `terms`, `duration`, `deliver_to_address`, `supplier_id`, `tax_type_id`, `contact_person`, `remarks`, `total_discount`, `total_before_tax`, `total_tax_amount`, `total_after_tax`, `approval_id`, `order_status_id`, `is_email_sent`, `is_active`, `is_deleted`, `date_created`, `date_modified`, `date_deleted`, `date_approved`, `approved_by_user`, `posted_by_user`, `deleted_by_user`, `modified_by_user`) VALUES 
  (1,'PO-20160922-1','2','NA','San Jose, San Simon, Pampanga',2,1,'','',0.00,111607.14,13392.86,125000.00,1,3,0,1,0,'2016-09-21 18:06:52','2016-09-23 21:19:40','0000-00-00 00:00:00','2016-09-23 21:19:40',1,1,0,1),
  (2,'PO-20160923-2','2','Months(s)','San Jose, San Simon, Pampanga',5,2,'','',0.00,89285.71,10714.29,100000.00,1,2,0,1,0,'2016-09-22 16:56:35','2016-09-23 21:19:44','0000-00-00 00:00:00','2016-09-23 21:19:44',1,1,0,0),
  (3,'PO-20160924-3','2','Months(s)','Apalit Pampanga',2,4,'','',0.00,89285.71,10714.29,100000.00,1,1,0,1,0,'2016-09-23 21:13:40','2016-09-23 21:19:47','0000-00-00 00:00:00','2016-09-23 21:19:47',1,1,0,0);
COMMIT;

#
# Data for the `purchase_order_items` table  (LIMIT 0,500)
#

INSERT INTO `purchase_order_items` (`po_item_id`, `purchase_order_id`, `product_id`, `unit_id`, `po_price`, `po_discount`, `po_line_total_discount`, `po_tax_rate`, `po_qty`, `po_line_total`, `tax_amount`, `non_tax_amount`) VALUES 
  (2,1,1,1,2500.00,0.00,0.00,12.00,50.00,125000.00,13392.86,111607.14),
  (3,2,1,1,1000.00,0.00,0.00,12.00,100.00,100000.00,10714.29,89285.71),
  (4,3,1,1,1000.00,0.00,0.00,12.00,100.00,100000.00,10714.29,89285.71);
COMMIT;

#
# Data for the `receivable_payments` table  (LIMIT 0,500)
#

INSERT INTO `receivable_payments` (`payment_id`, `receipt_no`, `customer_id`, `remarks`, `total_paid_amount`, `date_paid`, `date_created`, `date_deleted`, `date_cancelled`, `cancelled_by_user`, `created_by_user`, `deleted_by_user`, `is_active`, `is_deleted`) VALUES 
  (4,'567',7,'ddd',100.00,'2016-08-15','2016-08-14 16:25:03','0000-00-00 00:00:00','2016-08-14 17:06:47',1,1,0,0,0),
  (5,'dd',7,'dd',100.00,'2016-08-15','2016-08-14 17:07:18','0000-00-00 00:00:00','2016-08-14 17:07:22',1,1,0,0,0),
  (6,'12',8,'hey',110.00,'2016-08-15','2016-08-14 18:01:09','0000-00-00 00:00:00','2016-08-14 18:02:10',1,1,0,0,0),
  (7,'1',1,'',12.00,'2016-08-15','2016-08-14 20:08:23','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1,0,1,0),
  (8,'12',1,'dd',2.00,'2016-08-15','2016-08-14 20:15:01','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1,0,1,0),
  (9,'15678',1,'1',2.00,'2016-08-15','2016-08-14 20:53:39','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1,0,1,0);
COMMIT;

#
# Data for the `receivable_payments_list` table  (LIMIT 0,500)
#

INSERT INTO `receivable_payments_list` (`payment_list_id`, `payment_id`, `sales_invoice_id`, `receivable_amount`, `payment_amount`) VALUES 
  (3,4,1,1100.00,100.00),
  (4,5,1,1100.00,100.00),
  (5,6,2,20110.00,110.00),
  (6,7,3,24.00,12.00),
  (7,8,3,12.00,2.00),
  (8,9,3,10.00,2.00);
COMMIT;

#
# Data for the `rights_links` table  (LIMIT 0,500)
#

INSERT INTO `rights_links` (`link_id`, `parent_code`, `link_code`, `link_name`) VALUES 
  (1,'1','1-1','General Journal'),
  (2,'1','1-2','Cash Disbursement'),
  (3,'1','1-3','Purchase Journal'),
  (4,'1','1-4','Sales Journal'),
  (5,'1','1-5','Cash Receipt'),
  (6,'2','2-1','Purchase Order'),
  (7,'2','2-2','Purchase Invoice'),
  (8,'2','2-3','Record Payment'),
  (9,'2','2-4','Item Issuance'),
  (10,'2','2-5','Item Adjustment'),
  (11,'3','3-1','Sales Order'),
  (12,'3','3-2','Sales Invoice'),
  (13,'3','3-3','Record Payment'),
  (14,'4','4-1','Category Management'),
  (15,'4','4-2','Department Management'),
  (16,'4','4-3','Unit Management'),
  (17,'5','5-1','Product Management'),
  (18,'5','5-2','Supplier Management'),
  (19,'5','5-3','Customer Management'),
  (20,'6','6-1','Setup Tax'),
  (21,'6','6-2','Setup Chart of Accounts'),
  (22,'6','6-3','Account Integration'),
  (23,'6','6-4','Setup User Group'),
  (24,'6','6-5','Create User Account'),
  (25,'6','6-6','Setup Company Info'),
  (26,'7','7-1','Purchase Order Approval'),
  (27,'8','8-1','Balance Sheet Report'),
  (28,'','8-2','Income Statement');
COMMIT;

#
# Data for the `sales_invoice` table  (LIMIT 0,500)
#

INSERT INTO `sales_invoice` (`sales_invoice_id`, `sales_inv_no`, `sales_order_id`, `sales_order_no`, `department_id`, `customer_id`, `journal_id`, `remarks`, `total_discount`, `total_before_tax`, `total_tax_amount`, `total_after_tax`, `date_due`, `date_invoice`, `date_created`, `date_deleted`, `date_modified`, `posted_by_user`, `deleted_by_user`, `modified_by_user`, `is_paid`, `is_active`, `is_deleted`, `is_journal_posted`) VALUES 
  (1,'INV-20160918-1',0,'',1,1,4,'',0.00,660.00,0.00,660.00,'2016-09-18','2016-09-18','2016-09-17 15:16:24','0000-00-00 00:00:00','2016-09-17 15:26:06',1,0,0,0,1,0,1),
  (2,'INV-20160918-2',0,'',1,2,5,'',0.00,892.86,107.14,1000.00,'2016-09-18','2016-09-18','2016-09-17 15:17:05','0000-00-00 00:00:00','2016-09-17 15:26:32',1,0,0,0,1,0,1),
  (3,'INV-20160923-3',0,'',1,2,13,'',0.00,1200.00,0.00,1200.00,'2016-09-23','2016-09-23','2016-09-22 17:12:35','0000-00-00 00:00:00','2016-09-22 17:13:49',1,0,1,0,1,0,1),
  (4,'INV-20160924-4',0,'',1,1,3,'',0.00,2000.00,0.00,2000.00,'2016-09-24','2016-09-24','2016-09-23 19:33:47','0000-00-00 00:00:00','2016-09-23 19:34:05',1,0,0,0,1,0,1);
COMMIT;

#
# Data for the `sales_invoice_items` table  (LIMIT 0,500)
#

INSERT INTO `sales_invoice_items` (`sales_item_id`, `sales_invoice_id`, `product_id`, `unit_id`, `inv_price`, `inv_discount`, `inv_line_total_discount`, `inv_tax_rate`, `inv_qty`, `inv_line_total_price`, `inv_tax_amount`, `inv_non_tax_amount`) VALUES 
  (1,1,2,1,560.00,0.00,0.00,0.00,1.00,560.00,0.00,560.00),
  (2,1,1,2,100.00,0.00,0.00,0.00,1.00,100.00,0.00,100.00),
  (3,2,1,2,1000.00,0.00,0.00,12.00,1.00,1000.00,107.14,892.86),
  (5,3,1,1,1200.00,0.00,0.00,0.00,1.00,1200.00,0.00,1200.00),
  (6,4,1,1,1000.00,0.00,0.00,0.00,2.00,2000.00,0.00,2000.00);
COMMIT;

#
# Data for the `supplier_photos` table  (LIMIT 0,500)
#

INSERT INTO `supplier_photos` (`photo_id`, `supplier_id`, `photo_path`) VALUES 
  (3,1,'assets/img/supplier/57db755c84b7a.jpg'),
  (4,3,NULL),
  (8,4,'assets/img/anonymous-icon.png'),
  (9,2,''),
  (10,5,NULL);
COMMIT;

#
# Data for the `suppliers` table  (LIMIT 0,500)
#

INSERT INTO `suppliers` (`supplier_id`, `supplier_code`, `supplier_name`, `contact_person`, `address`, `email_address`, `landline`, `mobile_no`, `tin_no`, `total_payable_amount`, `posted_by_user`, `date_created`, `date_modified`, `tax_type_id`, `is_deleted`, `is_active`) VALUES 
  (1,'','MARIO FLORES','','San Fernando','mario@yahoo.com','','',NULL,2000.00,1,'2016-08-26 15:33:07','0000-00-00 00:00:00',1,0,1),
  (2,'','Paul Christian Rueda','','San Jose, San Simon, Pampanga','chrisrueda14@yahoo.com','','','',1076900.00,1,'2016-09-12 12:17:41','0000-00-00 00:00:00',4,0,1),
  (3,'','Jose Rizal','','San Jose, San Simon, Pampanga','chrisrueda14@yahoo.com',NULL,'','',100500.00,1,'2016-09-17 09:32:41','0000-00-00 00:00:00',1,0,1),
  (4,'','Albert Vitug','','Guagua Pampanga','','','','12111111',0.00,1,'2016-09-21 17:56:26','0000-00-00 00:00:00',2,0,1),
  (5,'','Manny Pacquiao','','General Santos','mannypacquiao@yahoo.com',NULL,'','',100000.00,1,'2016-09-22 16:53:58','0000-00-00 00:00:00',2,0,1);
COMMIT;

#
# Data for the `tax_types` table  (LIMIT 0,500)
#

INSERT INTO `tax_types` (`tax_type_id`, `tax_type`, `tax_rate`, `description`, `is_default`, `is_deleted`) VALUES 
  (1,'Non-vat',0.00,'',0,0),
  (2,'Vatted',12.00,'',1,0),
  (3,'g',121.00,'',0,0),
  (4,'hhh',12.00,NULL,0,0);
COMMIT;

#
# Data for the `units` table  (LIMIT 0,500)
#

INSERT INTO `units` (`unit_id`, `unit_code`, `unit_name`, `unit_desc`, `date_created`, `date_modified`, `is_deleted`, `is_active`) VALUES 
  (1,NULL,'none','',NULL,'0000-00-00 00:00:00',0,1),
  (2,NULL,'pcs','pieces',NULL,'0000-00-00 00:00:00',0,1);
COMMIT;

#
# Data for the `user_accounts` table  (LIMIT 0,500)
#

INSERT INTO `user_accounts` (`user_id`, `user_name`, `user_pword`, `user_lname`, `user_fname`, `user_mname`, `user_address`, `user_email`, `user_mobile`, `user_telephone`, `user_bdate`, `user_group_id`, `photo_path`, `file_directory`, `is_active`, `is_deleted`, `date_created`, `date_modified`, `date_deleted`, `modified_by_user`, `posted_by_user`, `deleted_by_user`) VALUES 
  (1,'admin','d033e22ae348aeb5660fc2140aec35850c4da997','Rueda','Paul Christian','Bontia','San Jose, San Simon, Pampanga','chrisrueda14@yahoo.com','0935-746-7601','','2016-08-01',1,'assets/img/user/57a35d39ba25a.jpg',NULL,1,0,NULL,'2016-08-04 08:20:34',0,0,0,0),
  (10,'gelyn','356a192b7913b04c54574d18c28d46e6395428ab','Manalang','Gelyn Joy','','','joyeous_jhoye@yahoo.com','','','2016-08-04',2,'assets/img/user/57e17900670ab.jpg',NULL,1,0,NULL,'2016-09-20 11:00:39',0,10,0,0),
  (11,'mario','356a192b7913b04c54574d18c28d46e6395428ab','FLores','Mario','','','','','','2016-09-23',2,'assets/img/anonymous-icon.png',NULL,1,0,'2016-09-22 16:47:04','0000-00-00 00:00:00',0,0,1,0);
COMMIT;

#
# Data for the `user_group_rights` table  (LIMIT 0,500)
#

INSERT INTO `user_group_rights` (`user_rights_id`, `user_group_id`, `link_code`) VALUES 
  (1,1,'1-1'),
  (2,1,'1-2'),
  (3,1,'1-3'),
  (4,1,'1-4'),
  (5,1,'1-5'),
  (6,1,'2-1'),
  (7,1,'2-2'),
  (8,1,'2-3'),
  (9,1,'2-4'),
  (10,1,'2-5'),
  (11,1,'3-1'),
  (12,1,'3-2'),
  (13,1,'3-3'),
  (14,1,'4-1'),
  (15,1,'4-2'),
  (16,1,'4-3'),
  (17,1,'5-1'),
  (18,1,'5-2'),
  (19,1,'5-3'),
  (20,1,'6-1'),
  (21,1,'6-2'),
  (22,1,'6-3'),
  (23,1,'6-4'),
  (24,1,'6-5'),
  (25,1,'6-6'),
  (26,1,'7-1'),
  (27,1,'8-1'),
  (28,1,'8-2'),
  (29,2,'1-1'),
  (30,2,'1-2'),
  (31,2,'1-3'),
  (32,2,'1-4'),
  (33,2,'1-5');
COMMIT;

#
# Data for the `user_groups` table  (LIMIT 0,500)
#

INSERT INTO `user_groups` (`user_group_id`, `user_group`, `user_group_desc`, `is_active`, `is_deleted`, `date_created`, `date_modified`) VALUES 
  (1,'System Administrator','Can access all features.',1,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (2,'Financing','',1,0,'0000-00-00 00:00:00','0000-00-00 00:00:00');
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;