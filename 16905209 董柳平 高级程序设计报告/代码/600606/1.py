import tushare as ts
df = ts.get_h_data('600606', autype='hfq',start='2015-01-01',end='2017-12-31')
df.to_csv('D:/day/600606.csv')
df.to_csv('D:/day/600606.csv',columns=['open','high','close','low','volume','amount'])
