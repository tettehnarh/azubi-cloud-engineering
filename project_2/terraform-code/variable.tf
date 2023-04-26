variable "location" {
  type        = string
  default     = "us-east-1"
  description = "description"
}

variable "db_name" {
  type        = string
  description = "The db name"
  default     = "GuestBook"
}

variable "harsh_key" {
  type        = string
  default     = "Email"
  description = "The Harsh Key"
}

variable "range_key" {
  type        = string
  default     = "Name"
  description = "The range key"
}

variable "attribute_name" {
  type        = string
  default     = "Country"
  description = "The Attribute name"
}

variable "global_secondary_index" {
  type        = string
  default     = "GuestBookIndex"
  description = "Global secondary index name"
}

variable "db_name_tag" {
  type        = string
  default     = "dynamodb_guestbook"
  description = "Team Agile Guest Book"
}
