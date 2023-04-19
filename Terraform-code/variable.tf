variable location {
  type        = string
  default     = "us-east-2"
  description = "description"
}

variable db_name {
    type = string
    description = "The db name"
    default = "GameScores"
}

variable harsh_key {
  type        = string
  default     = "UserId"
  description = "The Harsh Key"
}

variable range_key {
  type        = string
  default     = "GameTitle"
  description = "The range key"
}

variable attribute_name {
  type        = string
  default     = "TopScore"
  description = "The Attribute name"
}

variable global_secondary_index {
  type        = string
  default     = "GameTitleIndex"
  description = "Global secondary index name"
}

variable db_name_tag {
  type        = string
  default     = "dynamodb-table-1"
  description = "description"
}
