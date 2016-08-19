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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

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
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

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
  `remarks` varchar(555) DEFAULT '',
  `total_discount` decimal(20,2) DEFAULT '0.00',
  `total_before_tax` decimal(20,2) DEFAULT '0.00',
  `total_tax_amount` decimal(20,2) DEFAULT '0.00',
  `total_after_tax` decimal(20,2) DEFAULT '0.00',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  `date_due` date DEFAULT '0000-00-00',
  `date_delivered` date DEFAULT '0000-00-00',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `posted_by_user` int(11) DEFAULT '0',
  `modified_by_user` int(11) DEFAULT '0',
  `deleted_by_user` int(11) DEFAULT '0',
  PRIMARY KEY (`dr_invoice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Structure for the `departments` table : 
#

CREATE TABLE `departments` (
  `department_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `department_code` bigint(20) DEFAULT NULL,
  `department_name` varchar(255) DEFAULT NULL,
  `department_desc` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `is_deleted` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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
  `department_id` int(11) DEFAULT '0',
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

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
  `date_created` datetime DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_inventory` bit(1) DEFAULT b'1',
  `is_tax_exempt` bit(1) DEFAULT b'0',
  `is_deleted` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`sales_invoice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Structure for the `supplier_photos` table : 
#

CREATE TABLE `supplier_photos` (
  `photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) DEFAULT '0',
  `photo_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

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
  `posted_by_user` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `tax_type_id` int(11) DEFAULT '0',
  `is_deleted` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Definition for the `CreateReferenceNo` function : 
#

CREATE DEFINER = 'root'@'localhost' FUNCTION `CreateReferenceNo`(
        char_prefix VARCHAR(10)
    )
    RETURNS varchar(55) CHARSET latin1
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN
	DECLARE vCtrLastVal DOUBLE;
    
    SET vCtrLastVal=(SELECT IFNULL(MAX(m.Ctr),0)+1 FROM
    	(	
    		SELECT REPLACE(x.po_no,CONCAT(char_prefix,'-'),'') as Ctr FROM purchase_order as x
            WHERE x.po_no LIKE CONCAT(char_prefix,'%')
    	)
    	as m);/*will retrieve last counter value of priority no */
        
 
  RETURN CONCAT(char_prefix,'-',LPAD(vCtrLastVal,5,'0'));
END;

#
# Definition for the `JSONPair` function : 
#

CREATE DEFINER = 'root'@'localhost' FUNCTION `JSONPair`(
        name TEXT,
        value TEXT
    )
    RETURNS text CHARSET latin1
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN

  RETURN CONCAT('\"',name,'\":"',value,'"');
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
    
    TRUNCATE products;
    TRUNCATE `categories`;
    TRUNCATE `units`;
    
    TRUNCATE `suppliers`;
    TRUNCATE `supplier_photos`;
    
    TRUNCATE `customers`;
    TRUNCATE `customer_photos`;
    
    
END;

#
# Data for the `adjustment_info` table  (LIMIT 0,500)
#

INSERT INTO `adjustment_info` (`adjustment_id`, `adjustment_code`, `department_id`, `remarks`, `adjustment_type`, `total_discount`, `total_before_tax`, `total_after_tax`, `total_tax_amount`, `date_adjusted`, `date_created`, `date_modified`, `date_deleted`, `posted_by_user`, `modified_by_user`, `deleted_by_user`, `is_active`, `is_deleted`) VALUES 
  (7,'ffff',1,'dd','IN',100.00,20110.71,20124.00,13.29,'2016-08-03','2016-08-03 08:50:20','2016-08-08 13:56:55',NULL,1,1,0,1,0),
  (8,'ADJ-20160809-8',9,'','IN',0.00,200.00,200.00,0.00,'2016-08-08','2016-08-08 16:14:07','2016-08-08 16:14:07',NULL,1,0,0,1,0);
COMMIT;

#
# Data for the `adjustment_items` table  (LIMIT 0,500)
#

INSERT INTO `adjustment_items` (`adjustment_item_id`, `adjustment_id`, `product_id`, `unit_id`, `adjust_qty`, `adjust_price`, `adjust_discount`, `adjust_tax_rate`, `adjust_line_total_price`, `adjust_line_total_discount`, `adjust_tax_amount`, `adjust_non_tax_amount`) VALUES 
  (16,7,2,1,1.00,20000.00,0.00,0.00,20000.00,0.00,0.00,20000.00),
  (17,7,1,1,2.00,112.00,50.00,12.00,124.00,100.00,13.29,110.71),
  (18,8,1,1,2.00,100.00,0.00,0.00,200.00,0.00,0.00,200.00);
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
  (1,NULL,'Computer','',NULL,'0000-00-00 00:00:00',0,1);
COMMIT;

#
# Data for the `company_info` table  (LIMIT 0,500)
#

INSERT INTO `company_info` (`company_id`, `company_name`, `company_address`, `email_address`, `mobile_no`, `landline`, `tin_no`, `tax_type_id`, `registered_to`, `logo_path`) VALUES 
  (1,'JDEV IT Business Solution and SMS Professionals','Balibago, Angeles City, Pampanga','bss_consultants@yahoo.com','','(045) 322-3542','',1,'','assets/img/anonymous-icon.png');
COMMIT;

#
# Data for the `customers` table  (LIMIT 0,500)
#

INSERT INTO `customers` (`customer_id`, `customer_code`, `customer_name`, `address`, `email_address`, `landline`, `mobile_no`, `date_created`, `date_modified`, `is_deleted`, `is_active`) VALUES 
  (1,'','Paul Christian Rueda','aaa','aa','aa','aa','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1),
  (2,'','Paul','San Jose, San Simon, Pampanga','chrisrueda14@yahoo.com',NULL,'0935-746-7601','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1),
  (3,'','gelyn','','',NULL,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1),
  (4,'','Paul Bontia Rueda','','chrisrueda14@gmail.com',NULL,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1),
  (5,'','dd','dd','dd',NULL,'dd','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1),
  (6,'','Gelyn Joy Manalang','','',NULL,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1);
COMMIT;

#
# Data for the `delivery_invoice` table  (LIMIT 0,500)
#

INSERT INTO `delivery_invoice` (`dr_invoice_id`, `dr_invoice_no`, `purchase_order_id`, `external_ref_no`, `contact_person`, `terms`, `duration`, `supplier_id`, `tax_type_id`, `remarks`, `total_discount`, `total_before_tax`, `total_tax_amount`, `total_after_tax`, `is_active`, `is_deleted`, `date_due`, `date_delivered`, `date_created`, `date_modified`, `date_deleted`, `posted_by_user`, `modified_by_user`, `deleted_by_user`) VALUES 
  (1,'P-INV-20160811-1',1,'','Paul Christian','1','NA',1,1,'',0.00,500.00,60.00,560.00,1,0,'2016-08-11','2016-08-11','2016-08-10 20:35:14','2016-08-10 20:35:14','0000-00-00 00:00:00',1,0,0),
  (2,'P-INV-20160811-2',1,'','Paul Christian','1','NA',1,1,'',0.00,1300.00,156.00,1456.00,1,0,'2016-08-11','2016-08-11','2016-08-10 20:36:03','2016-08-10 20:36:03','0000-00-00 00:00:00',1,0,0),
  (3,'P-INV-20160811-3',1,'','Paul Christian','1','NA',1,1,'',0.00,200.00,24.00,224.00,1,0,'2016-08-11','2016-08-11','2016-08-10 20:36:29','2016-08-10 20:36:29','0000-00-00 00:00:00',1,0,0),
  (4,'P-INV-20160812-4',5,'','Manny Pacquiao','2','NA',2,1,'please deliver immediately,',0.00,17857.14,2142.86,20000.00,1,0,'2016-08-12','2016-08-12','2016-08-11 16:08:05','2016-08-11 16:08:05','0000-00-00 00:00:00',1,0,0);
COMMIT;

#
# Data for the `delivery_invoice_items` table  (LIMIT 0,500)
#

INSERT INTO `delivery_invoice_items` (`dr_invoice_item_id`, `dr_invoice_id`, `product_id`, `unit_id`, `dr_qty`, `dr_discount`, `dr_price`, `dr_line_total_discount`, `dr_line_total_price`, `dr_tax_rate`, `dr_tax_amount`, `dr_non_tax_amount`) VALUES 
  (1,1,2,1,5.00,0.00,112.00,0.00,560.00,12.00,60.00,500.00),
  (2,2,2,1,5.00,0.00,112.00,0.00,560.00,12.00,60.00,500.00),
  (3,2,1,1,8.00,0.00,112.00,0.00,896.00,12.00,96.00,800.00),
  (4,3,1,1,2.00,0.00,112.00,0.00,224.00,12.00,24.00,200.00),
  (5,4,2,1,1.00,0.00,20000.00,0.00,20000.00,12.00,2142.86,17857.14);
COMMIT;

#
# Data for the `departments` table  (LIMIT 0,500)
#

INSERT INTO `departments` (`department_id`, `department_code`, `department_name`, `department_desc`, `date_created`, `date_modified`, `is_deleted`, `is_active`) VALUES 
  (1,NULL,'dd','dd',NULL,'0000-00-00 00:00:00',0,1),
  (2,NULL,'f','f',NULL,'0000-00-00 00:00:00',0,1),
  (3,NULL,'dd','dd',NULL,'0000-00-00 00:00:00',0,1),
  (4,NULL,'de','',NULL,'0000-00-00 00:00:00',0,1),
  (5,NULL,'d','d',NULL,'0000-00-00 00:00:00',0,1),
  (6,NULL,'nn','nn',NULL,'0000-00-00 00:00:00',0,1),
  (7,NULL,'ddd','ddd',NULL,'0000-00-00 00:00:00',0,1),
  (8,NULL,'defdef','',NULL,'0000-00-00 00:00:00',0,1),
  (9,NULL,'mmm','mmm',NULL,'0000-00-00 00:00:00',0,1),
  (10,NULL,'Department 1','',NULL,'0000-00-00 00:00:00',0,1);
COMMIT;

#
# Data for the `issuance_info` table  (LIMIT 0,500)
#

INSERT INTO `issuance_info` (`issuance_id`, `slip_no`, `department_id`, `remarks`, `issued_to_person`, `total_discount`, `total_before_tax`, `total_tax_amount`, `total_after_tax`, `date_issued`, `date_created`, `date_modified`, `date_deleted`, `modified_by_user`, `posted_by_user`, `deleted_by_user`, `is_active`, `is_deleted`) VALUES 
  (24,'SLP-20160803-24',1,'','Paul Christian',100.00,20110.71,13.29,20124.00,'2016-08-03','2016-08-03 07:46:46','2016-08-03 08:33:50','2016-08-03 08:33:50',1,1,1,1,1),
  (25,'SLP-20160803-25',2,'ddd','1',0.00,20178.57,21.43,20200.00,'2016-08-03','2016-08-03 08:42:32','2016-08-03 08:49:52','2016-08-03 08:49:52',1,1,1,1,1),
  (26,'SLP-20160809-26',8,'dd','11',0.00,100.00,0.00,100.00,'2016-08-09','2016-08-08 16:12:45','2016-08-08 16:12:45','0000-00-00 00:00:00',0,1,0,1,0);
COMMIT;

#
# Data for the `issuance_items` table  (LIMIT 0,500)
#

INSERT INTO `issuance_items` (`issuance_item_id`, `issuance_id`, `product_id`, `unit_id`, `issue_qty`, `issue_price`, `issue_discount`, `issue_tax_rate`, `issue_line_total_price`, `issue_line_total_discount`, `issue_tax_amount`, `issue_non_tax_amount`) VALUES 
  (35,24,2,1,1.00,20000.00,0.00,0.00,20000.00,0.00,0.00,20000.00),
  (36,24,1,1,2.00,112.00,50.00,12.00,124.00,100.00,13.29,110.71),
  (38,25,2,1,1.00,20000.00,0.00,0.00,20000.00,0.00,0.00,20000.00),
  (39,25,1,1,2.00,100.00,0.00,12.00,200.00,0.00,21.43,178.57),
  (40,26,1,1,1.00,100.00,0.00,0.00,100.00,0.00,0.00,100.00);
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
  (25,5,'Chrysanthemum.jpg','assets/files/po/attachments/57ad049e86444.jpg','2016-08-11 16:05:02',1,0);
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
  (67,2,1,'kindly send me attachment.','2016-08-04 18:49:41','0000-00-00 00:00:00',0),
  (68,4,1,'hello','2016-08-04 19:40:29','0000-00-00 00:00:00',0),
  (69,5,1,'please send me attachment.','2016-08-05 08:39:01','0000-00-00 00:00:00',0),
  (70,6,1,'please send attachment.','2016-08-05 14:10:48','0000-00-00 00:00:00',0),
  (71,6,10,'yes sir. already attached.','2016-08-05 14:12:24','0000-00-00 00:00:00',0),
  (72,6,10,'hi','2016-08-05 14:20:30','0000-00-00 00:00:00',0),
  (73,5,1,'please','2016-08-06 17:04:12','0000-00-00 00:00:00',0),
  (74,1,1,'testing','2016-08-11 11:24:13','0000-00-00 00:00:00',0),
  (75,1,1,'hello','2016-08-11 11:27:12','0000-00-00 00:00:00',0),
  (76,5,10,'please send me attachment.','2016-08-11 16:04:27','0000-00-00 00:00:00',0),
  (77,5,1,'yes sir.','2016-08-11 16:04:44','0000-00-00 00:00:00',0);
COMMIT;

#
# Data for the `products` table  (LIMIT 0,500)
#

INSERT INTO `products` (`product_id`, `product_code`, `product_desc`, `product_desc1`, `category_id`, `department_id`, `unit_id`, `equivalent_points`, `product_warn`, `product_ideal`, `purchase_cost`, `markup_percent`, `sale_price`, `whole_sale`, `retailer_price`, `special_disc`, `valued_customer`, `date_created`, `date_modified`, `is_inventory`, `is_tax_exempt`, `is_deleted`, `is_active`) VALUES 
  (1,'1','Computer Case','',1,0,1,0,0.00,0.00,100.00,10.00,110.00,0.00,0.00,0.00,0.00,NULL,'0000-00-00 00:00:00',1,1,0,1),
  (2,'2','Laptop','',1,0,1,0,0.00,0.00,20000.00,0.00,20000.00,0.00,0.00,0.00,0.00,NULL,'0000-00-00 00:00:00',1,1,0,1);
COMMIT;

#
# Data for the `purchase_order` table  (LIMIT 0,500)
#

INSERT INTO `purchase_order` (`purchase_order_id`, `po_no`, `terms`, `duration`, `deliver_to_address`, `supplier_id`, `tax_type_id`, `contact_person`, `remarks`, `total_discount`, `total_before_tax`, `total_tax_amount`, `total_after_tax`, `approval_id`, `order_status_id`, `is_email_sent`, `is_active`, `is_deleted`, `date_created`, `date_modified`, `date_deleted`, `date_approved`, `approved_by_user`, `posted_by_user`, `deleted_by_user`, `modified_by_user`) VALUES 
  (1,'PO-20160811-1','1','NA','Balibago, Angeles City, Pampanga',1,4,'Paul Christian','',0.00,2000.00,240.00,2240.00,2,2,0,1,0,'2016-08-10 20:34:41','2016-08-10 20:36:29','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1,0,0),
  (2,'PO-20160811-2','2','Months(s)','Pampanga',1,1,'Floyd Mayweather','',0.00,20100.00,0.00,20100.00,2,1,0,1,0,'2016-08-11 10:56:33','2016-08-11 10:56:33','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1,0,0),
  (3,'PO-20160811-3','2','Day(s)','San Jose, San Simon, Pampanga',1,1,'Manny Pacquiao','',0.00,20100.00,0.00,20100.00,2,1,0,1,0,'2016-08-11 11:03:15','2016-08-11 11:03:15','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1,0,0),
  (4,'PO-20160811-4','2','Months(s)','Apalit, Pampanga',2,2,'Mario','Please deliver today.',0.00,20100.00,0.00,20100.00,2,1,0,1,0,'2016-08-11 11:13:58','2016-08-11 11:13:58','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1,0,0),
  (5,'PO-20160812-5','2','Months(s)','Magalang Pampanga',2,2,'Manny Pacquiao','please deliver immediately,',0.00,17957.14,2142.86,20100.00,1,3,1,1,0,'2016-08-11 16:01:46','2016-08-11 16:08:05','0000-00-00 00:00:00','2016-08-11 16:05:40',10,1,0,0);
COMMIT;

#
# Data for the `purchase_order_items` table  (LIMIT 0,500)
#

INSERT INTO `purchase_order_items` (`po_item_id`, `purchase_order_id`, `product_id`, `unit_id`, `po_price`, `po_discount`, `po_line_total_discount`, `po_tax_rate`, `po_qty`, `po_line_total`, `tax_amount`, `non_tax_amount`) VALUES 
  (1,1,2,1,112.00,0.00,0.00,12.00,10.00,1120.00,120.00,1000.00),
  (2,1,1,1,112.00,0.00,0.00,12.00,10.00,1120.00,120.00,1000.00),
  (3,2,2,1,20000.00,0.00,0.00,0.00,1.00,20000.00,0.00,20000.00),
  (4,2,1,1,100.00,0.00,0.00,0.00,1.00,100.00,0.00,100.00),
  (5,3,2,1,20000.00,0.00,0.00,0.00,1.00,20000.00,0.00,20000.00),
  (6,3,1,1,100.00,0.00,0.00,0.00,1.00,100.00,0.00,100.00),
  (7,4,2,1,20000.00,0.00,0.00,0.00,1.00,20000.00,0.00,20000.00),
  (8,4,1,1,100.00,0.00,0.00,0.00,1.00,100.00,0.00,100.00),
  (9,5,2,1,20000.00,0.00,0.00,12.00,1.00,20000.00,2142.86,17857.14),
  (10,5,1,1,100.00,0.00,0.00,0.00,1.00,100.00,0.00,100.00);
COMMIT;

#
# Data for the `sales_invoice` table  (LIMIT 0,500)
#

INSERT INTO `sales_invoice` (`sales_invoice_id`, `sales_inv_no`, `sales_order_id`, `sales_order_no`, `department_id`, `customer_id`, `remarks`, `total_discount`, `total_before_tax`, `total_tax_amount`, `total_after_tax`, `date_due`, `date_invoice`, `date_created`, `date_deleted`, `date_modified`, `posted_by_user`, `deleted_by_user`, `modified_by_user`, `is_active`, `is_deleted`) VALUES 
  (1,'INV-20160811-1',1,'',10,6,'',0.00,500.00,60.00,560.00,'2016-08-11','2016-08-11','2016-08-10 20:40:01','0000-00-00 00:00:00','2016-08-10 20:40:01',1,0,0,1,0),
  (2,'INV-20160811-2',1,'',10,6,'',0.00,1300.00,156.00,1456.00,'2016-08-11','2016-08-11','2016-08-10 20:40:28','0000-00-00 00:00:00','2016-08-10 20:40:28',1,0,0,1,0),
  (3,'INV-20160811-3',1,'',10,6,'',0.00,100.00,12.00,112.00,'2016-08-11','2016-08-11','2016-08-10 20:45:14','0000-00-00 00:00:00','2016-08-10 20:45:14',1,0,0,1,0),
  (4,'INV-20160811-4',0,'',10,6,'',0.00,100.00,12.00,112.00,'2016-08-18','2016-08-11','2016-08-10 20:45:27','0000-00-00 00:00:00','2016-08-10 20:45:43',1,0,1,1,0),
  (5,'INV-20160811-5',0,'',1,1,'',0.00,416.43,23.57,440.00,'2016-08-11','2016-08-11','2016-08-10 20:59:03','0000-00-00 00:00:00','2016-08-10 20:59:03',1,0,0,1,0);
COMMIT;

#
# Data for the `sales_invoice_items` table  (LIMIT 0,500)
#

INSERT INTO `sales_invoice_items` (`sales_item_id`, `sales_invoice_id`, `product_id`, `unit_id`, `inv_price`, `inv_discount`, `inv_line_total_discount`, `inv_tax_rate`, `inv_qty`, `inv_line_total_price`, `inv_tax_amount`, `inv_non_tax_amount`) VALUES 
  (1,1,2,1,112.00,0.00,0.00,12.00,5.00,560.00,60.00,500.00),
  (2,2,2,1,112.00,0.00,0.00,12.00,5.00,560.00,60.00,500.00),
  (3,2,1,1,112.00,0.00,0.00,12.00,8.00,896.00,96.00,800.00),
  (4,3,1,1,112.00,0.00,0.00,12.00,1.00,112.00,12.00,100.00),
  (6,4,1,1,112.00,0.00,0.00,12.00,1.00,112.00,12.00,100.00),
  (7,5,1,1,110.00,0.00,0.00,12.00,2.00,220.00,23.57,196.43),
  (8,5,1,1,110.00,0.00,0.00,0.00,2.00,220.00,0.00,220.00);
COMMIT;

#
# Data for the `sales_order` table  (LIMIT 0,500)
#

INSERT INTO `sales_order` (`sales_order_id`, `so_no`, `customer_id`, `department_id`, `remarks`, `total_discount`, `total_before_tax`, `total_after_tax`, `total_tax_amount`, `order_status_id`, `date_order`, `date_created`, `date_deleted`, `date_modified`, `posted_by_user`, `modified_by_user`, `deleted_by_user`, `is_active`, `is_deleted`) VALUES 
  (1,'SO-20160811-1',6,10,'',0.00,2000.00,2240.00,240.00,2,'2016-08-11','2016-08-10 20:39:38',NULL,'0000-00-00 00:00:00',1,0,0,1,0),
  (2,'SO-20160811-2',1,1,'',0.00,224.00,224.00,0.00,1,'2016-08-11','2016-08-10 20:53:20',NULL,'0000-00-00 00:00:00',1,0,0,1,0),
  (3,'SO-20160811-3',1,2,'ddd',0.00,196.43,220.00,23.57,1,'2016-08-11','2016-08-10 20:56:23',NULL,'0000-00-00 00:00:00',1,0,0,1,0);
COMMIT;

#
# Data for the `sales_order_items` table  (LIMIT 0,500)
#

INSERT INTO `sales_order_items` (`sales_order_item_id`, `sales_order_id`, `product_id`, `unit_id`, `so_qty`, `so_price`, `so_discount`, `so_line_total_discount`, `so_tax_rate`, `so_line_total_price`, `so_tax_amount`, `so_non_tax_amount`) VALUES 
  (1,1,2,1,10.00,112.00,0.00,0.00,12.00,1120.00,120.00,1000.00),
  (2,1,1,1,10.00,112.00,0.00,0.00,12.00,1120.00,120.00,1000.00),
  (3,2,2,1,1.00,112.00,0.00,0.00,0.00,112.00,0.00,112.00),
  (4,2,1,1,1.00,112.00,0.00,0.00,0.00,112.00,0.00,112.00),
  (5,3,1,1,2.00,110.00,0.00,0.00,12.00,220.00,23.57,196.43);
COMMIT;

#
# Data for the `supplier_photos` table  (LIMIT 0,500)
#

INSERT INTO `supplier_photos` (`photo_id`, `supplier_id`, `photo_path`) VALUES 
  (24,2,'assets/img/supplier/57ad06be911fc.jpg'),
  (25,3,NULL);
COMMIT;

#
# Data for the `suppliers` table  (LIMIT 0,500)
#

INSERT INTO `suppliers` (`supplier_id`, `supplier_code`, `supplier_name`, `contact_person`, `address`, `email_address`, `landline`, `mobile_no`, `tin_no`, `posted_by_user`, `date_created`, `date_modified`, `tax_type_id`, `is_deleted`, `is_active`) VALUES 
  (1,'','National Bookstore','','Balibago Angeles City, Pampaga, Philippines','national@yahoo.com.ph','1234-8789','09357880390','1122-6789-9330',1,'2016-08-10 23:33:37','0000-00-00 00:00:00',1,0,1),
  (2,'','ACE Hardware','','SM Pampanga, Lagundi Mexico, Pampanga','acehardware@gmail.com','898-9888','0935-1234-009','1223-5678-999',1,'2016-08-10 23:40:20','0000-00-00 00:00:00',2,0,1),
  (3,'','Mario FLores','','Pampanga','mario@yahoo.com',NULL,'','',10,'2016-08-11 16:15:36','0000-00-00 00:00:00',2,0,1);
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
  (1,NULL,'pcs','pieces',NULL,'0000-00-00 00:00:00',0,1);
COMMIT;

#
# Data for the `user_accounts` table  (LIMIT 0,500)
#

INSERT INTO `user_accounts` (`user_id`, `user_name`, `user_pword`, `user_lname`, `user_fname`, `user_mname`, `user_address`, `user_email`, `user_mobile`, `user_telephone`, `user_bdate`, `user_group_id`, `photo_path`, `file_directory`, `is_active`, `is_deleted`, `date_created`, `date_modified`) VALUES 
  (1,'admin','d033e22ae348aeb5660fc2140aec35850c4da997','Rueda','Paul Christian','Bontia','San Jose, San Simon, Pampanga','chrisrueda14@yahoo.com','0935-746-7601','','2016-08-01',1,'assets/img/user/57a35d39ba25a.jpg',NULL,1,0,NULL,'2016-08-04 08:20:34'),
  (10,'gelyn','356a192b7913b04c54574d18c28d46e6395428ab','Manalang','Gelyn Joy','','','','','','2016-08-04',2,'assets/img/user/57a35f16e578b.jpg',NULL,1,0,NULL,'0000-00-00 00:00:00');
COMMIT;

#
# Data for the `user_groups` table  (LIMIT 0,500)
#

INSERT INTO `user_groups` (`user_group_id`, `user_group`, `user_group_desc`, `is_active`, `is_deleted`, `date_created`, `date_modified`) VALUES 
  (1,'Super User','Can access all features.',1,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (2,'System Administrator','',1,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (3,'Accounting','',1,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (4,'accounting','',1,0,'0000-00-00 00:00:00','0000-00-00 00:00:00');
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;