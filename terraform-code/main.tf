provider "aws" {
  region = var.location
}

#dynamo db table resource
resource "aws_dynamodb_table" "basic-dynamodb-table" {
  name           = var.db_name
  billing_mode   = "PROVISIONED"
  read_capacity  = 20
  write_capacity = 20
  hash_key       = var.harsh_key
  range_key      = var.range_key

  attribute {
    name = var.harsh_key
    type = "S"
  }

  attribute {
    name = var.range_key
    type = "S"
  }

  attribute {
    name = var.attribute_name
    type = "N"
  }

  ttl {
    attribute_name = "TimeToExist"
    enabled        = false
  }

  global_secondary_index {
    name               = var.global_secondary_index
    hash_key           = var.harsh_key
    range_key          = var.attribute_name
    write_capacity     = 10
    read_capacity      = 10
    projection_type    = "INCLUDE"
    non_key_attributes = [var.harsh_key]
  }

  tags = {
    Name        = var.db_name_tag
    Environment = "production"
  }
}