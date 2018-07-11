TODOs:
    load the custom post to front page

DONE:
    - data fetching from remote API
    - XML parsing
    - creating custom post product from the parsed data
    - dataum to dataum matching is a business decision, hence kept data as it comes.

For data import
    Settings-> Import Product
    Place the url http://pf.tradetracker.net/?aid=1&encoding=utf-8&type=xml-v2&fid=381490&categoryType=2&additionalType=2
    And submit button


Future Enhancement
    - Fetch data from the feed URI
    - Save to flat file name on timestamp
    - track the fetch datetime using database
    - run cli version of php in cron to import data to database using wordpress.
    - display the progress and result in wordpress admin login.
