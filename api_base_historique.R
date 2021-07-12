library(DBI)
# Connect to the default postgres database


db <- 'DES'  #provide the name of your db

host_db <- '10.240.0.150' 

db_port <- '5432'  # or any other port specified by the DBA

db_user <- 'slfadmin' 

db_password <- 'slf@dm!123!'

conn <- dbConnect(RPostgres::Postgres(), dbname = db, host=host_db, port=db_port, user=db_user, password=db_password)

args = commandArgs(trailingOnly=TRUE)

if (length(args)>0) {
  dt<-args[1]
}

query <-paste0("select * from public.first_dataset where id_client = ",dt)
query_base <- dbSendQuery(conn,query)
BASE <- dbFetch(query_base)
names(BASE) <- toupper(names(BASE))

print(length(BASE$NUMDOSS))
