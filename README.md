# my-public-work
# to run the WithdrawalMachine file use the php WithdrawalMachine.php command
#following are the test scenarios:
#1.Entry: 30.00 Result: [20.00 -&gt; 1, 10.00 -&gt; 1]
#2.Entry: 80.00 Result: [50.00 -&gt; 1, 20.00 -&gt; 1, 10.00 -&gt; 1]
#3.Entry: 125.00 Result: throw NoteUnavailableException
#4.Entry: -130.00 Result: throw InvalidArgumentException
#5.Entry: 3000 Result: throw NotEnoughNoteException
