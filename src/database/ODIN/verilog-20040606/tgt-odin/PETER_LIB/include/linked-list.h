#ifndef _LINKED_LIST_H
#define _LINKED_LIST_H  /* to ensure we don't include it more than once */

/*
** LinkedList routines: a smallest-at-top list.  You also supply a
** comparison function.  You allocate a LL using LinkedListAlloc, and
** LinkedListCmp is a pointer to a function to compare your entries.
** Entries are of type foint (union of int and void*).  See "misc.h"
** A foint is about as close to a general "object" that you can get in C
** without doing major surgery.
*/
#define foint void*

/* The comparison function type: used by heaps, binary trees and sorts.
*/
typedef int (*pCmpFcn)(foint, foint);

typedef struct _linkedListNode
{
    struct _linkedListNode *next;
    foint data;
} LINKED_LIST_NODE;

typedef struct _linkedListType
{
    int n;
    pCmpFcn Cmp;
    LINKED_LIST_NODE *first, *last;
} LINKED_LIST;

/*
** This will allocate a linked list and make it empty.
*/
LINKED_LIST *LinkedListAlloc(pCmpFcn);

/*
** This tells us how many items are in the linked list.
*/
int     LinkedListSize(LINKED_LIST*);

/* free the entire list */
void    LinkedListFree(LINKED_LIST*);

/* Look at but do not take the first element */
foint   LinkedListPeek(LINKED_LIST*);

/* delete and return the first element in the list */
foint   LinkedListNext(LINKED_LIST*);

/*
** Insert something at the front of the list, ignoring the comparison
** function.
*/
foint   LinkedListPrepend(LINKED_LIST*, foint);

/*
** Insert something at the end of the list, igroning the comparison function.
*/
foint   LinkedListAppend(LINKED_LIST*, foint); /* insert at back */

/*
** Insert something in the list, using the comparison function.  The element
** should be inserted *after* any elements that compare equally; that way,
** even if two events have the same time, they get executed in the order
** in which they were inserted.  This is sometimes important.
*/
foint   LinkedListInsert(LINKED_LIST*, foint);

/*
** paj - grabs the next entry based on the entry you put in 
*/
LINKED_LIST_NODE   *LinkedListNodeNext(LINKED_LIST_NODE*);

/*
** paj - converts a LINKED_LIST_NODE into its data
*/
foint LinkedListNodeData(LINKED_LIST_NODE *lln);

/*
** paj - Grabs the head pointer
*/
LINKED_LIST_NODE   *LinkedListNodePeek(LINKED_LIST*);

/*
 * paj - copies one linked list to the other
 * */
void   LinkedListCopy(LINKED_LIST*, LINKED_LIST*);

/*
 * paj - copies entries from lf to lt if lt does not contain the same data 
 * pointer already
 * */
void   LinkedListCopyIfNotExistInTo(LINKED_LIST*, LINKED_LIST*);

/*
 * paj - Inserts a void type object if void doesn't appear in the list 
 * */
int  LinkedListAppendVoidIfNotExist(LINKED_LIST*, foint);

/* paj -LinkedListDeleteVoid: searches for to_remove and if finds, removes */
int LinkedListRemoveVoid(LINKED_LIST *ll, foint newEntry);

void LinkedListReset(LINKED_LIST *ll);

#endif
