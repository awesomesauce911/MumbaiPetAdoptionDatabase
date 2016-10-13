# Mumbai Pet Adoption Database

This is the code for a website that hosts a database of Mumbai's stray animals up for adoption.

The data is stored in *FullData.db*. A python script connects to *AdditionalData.csv*, and adds the data to the *sqlite3* database.

The HTML homepage is based on a Bootstrap template. The search function calls *search.php*, which searches the sqlite3 database for the appropriate results, then presents them.
