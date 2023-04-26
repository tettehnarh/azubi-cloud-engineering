# Add an item to the GuestBook table

#dynamo db table resource
resource "aws_dynamodb_table_item" "item1" {
  # The insertion of this item into the Guest Book table depends entirely ont he table being created
  depends_on = [
    aws_dynamodb_table.basic-dynamodb-table
  ]
  table_name = aws_dynamodb_table.basic-dynamodb-table.name
  hash_key   = aws_dynamodb_table.basic-dynamodb-table.hash_key
  range_key  = aws_dynamodb_table.basic-dynamodb-table.range_key

  item = <<ITEM
  {
    "Email": {"S": "kofi@mail.com"},
    "Name": {"S": "Kofi"},
    "Country": {"S": "Ghana"}
  }
  ITEM
}









