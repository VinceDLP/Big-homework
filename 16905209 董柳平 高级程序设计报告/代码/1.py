import tushare as ts
df = ts.get_h_data('601138', autype='hfq',start='2015-12-31',end='2017-12-31')
df.to_csv('D:/day/601138.csv')
df.to_csv('D:/day/601138.csv',columns=['open','high','close','low','volume','amount'])
